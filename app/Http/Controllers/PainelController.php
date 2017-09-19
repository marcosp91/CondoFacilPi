<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Requests;

class PainelController extends Controller
{   
    public function __construct(){
        
        $this->middleware('auth');
        
    }
    
    public function index(){
        return view('home');
    }
    
    public function cadastrar(){
      
        return view('auth.register');
    }
    
    public function store(Request $request){
        $dadosForm = $request->all();
        
        $dadosForm['privilegio'] = (!isset($_SESSION['usuario'])) ? 1 : 0;
        
        $validacao = validator($dadosForm, $this->usuario->regras);
        if ($validacao->fails()){
            return redirect('/painel/cadastrar')
                ->withErrors($validacao)
                ->withInput();
        }
        
        $insert = $this->usuario->create($dadosForm);
        
        if($insert)
            return redirect()->route('/painel/login');
        else
            return redirect()->route('painel.cadastrar');
    }
}
