<?php

namespace App\Http\Controllers;

use App\Models\Painel\Condominio;
use App\Models\Painel\Usuario;
use App\Models\Painel\Aviso;
use App\Models\Painel\Sindico;
use App\Models\Painel\Publicacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Painel\CondominioFormRequest;
use function redirect;
use function validator;
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
    
    public function condominio() {
        return view('dashboard.cadastro.condominio');
    }
    
    public function condomino() {
        return view('dashboard.cadastro.condomino');
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
        
        if($insert)
            return redirect()->route('condominio.cadastro')->with('mensagemSUCESSO', 'Aviso publicado com sucesso!');
        else
            return redirect()->route('condominio.cadastro')->with('mensagemERRO', 'Algo deu errado na publicação do aviso!');
    }
    
    public function avisos() {
        return view('dashboard.aviso');
    }
    
    public function cadastrarPublicacao(Request $request){
        $dadosForm = $request->all();
       
        $classe = $dadosForm['classe'];
        
        
        $publicacao = new $classe;

        $novaPublicacao = $publicacao->publicaMensagem($dadosForm);
        
        
        //dd("oi");
        $insert = $publicacao->create($novaPublicacao);
        
        if($insert){
            return redirect()->route('avisos.index')->with('mensagemSUCESSO', 'Aviso publicado com sucesso!');
        }else{
            return redirect()->route('avisos.index')->with('mensagemERRO', 'Algo deu errado na publicação do aviso!');
        }
    }
    

    public function logout(){
      
        session_destroy();
        return redirect()->route('login.index');
    }
    
}