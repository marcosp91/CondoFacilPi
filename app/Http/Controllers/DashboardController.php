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
    
    public function cadastrarPublicacao(AvisosFormRequest $request){
        $dadosForm = $request->all();
        
        $publicacao = new $dadosForm['classe'];

        $novaPublicacao = $publicacao->publicaMensagem($dadosForm);
        
        $insert = $publicacao->create($novaPublicacao);
        
        if($insert){
            return redirect()->route('avisos.index')->with('mensagemSUCESSO', 'Nova Publicacão cadastrada com sucesso!');
        }else{
            return redirect()->route('avisos.index')->with('mensagemERRO', 'Ops! Algo aconteceu de errado na publicação!');
        }
    }

    public function logout(){
      
        session_destroy();
        return redirect()->route('login.index');
    }
    
}