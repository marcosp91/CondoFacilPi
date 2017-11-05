<?php

namespace App\Http\Controllers;

use App\Http\Requests\Painel\AvisosFormRequest;
use App\Http\Requests\Painel\CondominioFormRequest;
use App\Models\Painel\Condominio;
use App\Models\Painel\Publicacao;
use App\Models\Painel\Usuario;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;

session_start();
class DashboardController extends Controller
{
    private $condominio;
    private $usuario;
    private $publicacao;

    public function __construct(Publicacao $publicacao, Condominio $condominio, Usuario $usuario) {
        $this->condominio = $condominio;
        $this->usuario = $usuario;
        $this->publicacao = $publicacao;
    }
    
    public function home()
    {
        return view('dashboard.home');
    }
    
    public function condominio() 
    {
        return view('dashboard.cadastro.condominio');
    }
    
    public function condomino() 
    {
        return view('dashboard.cadastro.condomino');
    }

    public function avisos() {
        return view('dashboard.aviso');
    }

    public function cadastrarCondominio(CondominioFormRequest $request) {
        $dadosForm = $request->all();
        $dadosForm['privilegio'] = (!isset($_SESSION['usuario'])) ? 1 : 0;
    
        $insert = $this->condominio->create($dadosForm);
        
        $usuario = $this->usuario->find($_SESSION['usuario']->id);
        
        $condominio = DB::table('condominios')
                     ->select('id')
                     ->where('cnpj', '=', $dadosForm['cnpj'])
                     ->get()
                     ->first();
        
        $usuario->condominio_id = $condominio->id;
        $update = $usuario->save();

        if ($update){
            $usuario = DB::table('usuarios')
                     ->select('*')
                     ->where('email', '=', $_SESSION['usuario']->email)
                     ->get()
                     ->first();
            
            if ($usuario){   
                $_SESSION['usuario'] = $usuario;
            }
        }
        
        if($insert == true && $update = true)
            return redirect()->route('dashboard.home')->with('mensagemSUCESSO', 'Condomínio cadastrado com sucesso!');
        else
            return redirect()->route('condominio.cadastro')->with('mensagemERRO', 'Algo deu errado no cadastro do seu condomínio!');
    }
    
    
    public function cadastrarPublicacao(AvisosFormRequest $request){
        $dadosForm = $request->all();

        $publicacao = new $dadosForm['classe'];

        $novaPublicacao = $publicacao->publicaMensagem($dadosForm);
        
        $insert = $publicacao->create($novaPublicacao);
        
        if($insert){
            return redirect()->route('avisos.index')->with('mensagemSUCESSO', 'Publicado com sucesso!');
        }else{
            return redirect()->route('avisos.index')->with('mensagemERRO', 'Algo deu errado na publicação!');
        }
    }

    public function logout(){
      
        session_destroy();
        return redirect()->route('login.index');
    }
    
}