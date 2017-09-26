<?php

namespace App\Http\Controllers;

use App\Models\Painel\Condominio;
use App\Models\Painel\Usuario;
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
    
    public function __construct(Condominio $condominio, Usuario $usuario) {
        $this->condominio = $condominio;
        $this->usuario = $usuario;
    }
    
    public function condominio() {
        return view('dashboard.condominio');
    }
    
    public function cadastrarCondominio(CondominioFormRequest $request) {
        $dadosForm = $request->all();
        $dadosForm['privilegio'] = (!isset($_SESSION['usuario'])) ? 1 : 0;
        
        /**Utilizando novo metodo da classe CondominioFormRequest para validação
         
        $validacao = validator($dadosForm, $this->condominio->regras);
        if ($validacao->fails()){
            return redirect()->route('condominio.cadastro')
                ->withErrors($validacao)
                ->withInput();
        }
        **/
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
            return redirect()->route('condominio.cadastro');
        else
            return redirect()->route('condominio.cadastro');
    }
    
    public function logout(){
      
        session_destroy();
        return redirect()->route('login.index');
    }
    
}