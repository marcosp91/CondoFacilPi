<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

session_start();
class DashboardController extends Controller
{
    public function condominio() {
        return view('dashboard.condominio');
    }
    
    public function cadastrarCondominio(Request $request) {
        $dadosForm = $request->all();
        
        //$dadosForm['privilegio'] = (!isset($_SESSION['usuario'])) ? 1 : 0;
        
        $validacao = validator($dadosForm, $this->condominio->regras);
        if ($validacao->fails()){
            return redirect()->route('dashboard.cadastrarCondominio')
                ->withErrors($validacao)
                ->withInput();
        }
        
        $insert = $this->usuario->create($dadosForm);
        
        if($insert)
            return redirect()->route('dashboard.login');
        else
            return redirect()->route('dashboard.cadastrarCondominio');
    }
    
    public function logout(){
      
        session_destroy();
        return redirect()->route('login.index');
    }
    
}