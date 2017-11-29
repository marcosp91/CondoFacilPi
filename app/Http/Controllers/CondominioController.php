<?php

namespace App\Http\Controllers;

use App\Http\Requests\Painel\CondominioFormRequest;
use App\Models\Painel\Condominio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function dd;
use function redirect;
use function view;

session_start();
class CondominioController extends Controller
{
    private $condominio;
    
    public function __construct(Condominio $condominio)
    {
        $this->condominio = $condominio;
    }
    
    public function index()
    {
        if ($_SESSION['usuario']->condominio_id != null) {
            $condominio = $this->condominio->find($_SESSION['usuario']->condominio_id);  
        }
        else{
            $condominio = (Object) array();
        }
        
        return view('dashboard.cadastro.condominio', compact('condominio'));
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
            return redirect()->route('dashboard.home')->with('mensagemSUCESSO', 'Novo Condomínio cadastrado com sucesso!');
        else
            return redirect()->route('condominio.cadastro')->with('mensagemERRO', 'Ops! Algo aconteceu de errado no cadastro do seu condomínio!');
    }
    
    public function atualizaCondominio(Request $request){
        $condominio = $this->condominio->find($_SESSION['usuario']->condominio_id);
        $condominio = $condominio->fill($request->all());
        $update = $condominio->save();
        
        if($update)
            return redirect()->route('dashboard.home')->with('mensagemSUCESSO', 'Seu condomínio foi atualizado com sucesso!');
        else
            return redirect()->route('condominio.cadastro')->with('mensagemERRO', 'Ops! Algo aconteceu de errado na atualização do seu condomínio!');
    }
    
}
