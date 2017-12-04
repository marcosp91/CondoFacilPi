<?php

namespace App\Http\Controllers;

use App\Http\Requests\Painel\UsuarioFormRequest;
use App\Models\Painel\Condomino;
use App\Models\Painel\Sindico;
use App\Models\Painel\Usuario;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function dd;
use function redirect;
use function validator;
use function view;

session_start();
class UsuarioController extends Controller
{
    private $usuario;
    
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index(Usuario $usuario)
    {
        if ($_SESSION['usuario']->condominio_id != null) {
            $usuarios = $usuario->all()->where('condominio_id', '=', $_SESSION['usuario']->condominio_id);
        }
        else{
            $usuarios = array();
        }
        
        return view('dashboard.cadastro.condomino', compact('usuarios'));
    }

   
    public function create()
    {
        return view('auth.cadastrar');
    }

   
    public function store(Request $request)
    {
        $dadosForm = $request->all();

        if($dadosForm['classe'] === 'Sindico'){
            $usuario = new Sindico;
            
            $validacao = validator($dadosForm, $usuario->regras, $usuario->menssagemErros);
            if ($validacao->fails()){
                return redirect()->route('painel.cadastrar')
                    ->withErrors($validacao)
                    ->withInput();
            }
        }elseif($dadosForm['classe'] === 'Condomino'){
            $usuario = new Condomino;
            
            $validacao = validator($dadosForm, $usuario->regras, $usuario->menssagemErros);
            if ($validacao->fails()){
                return redirect()->route('condomino.index')
                    ->withErrors($validacao)
                    ->withInput();
            }
        }
        
        
        $novoUsuario = $usuario->cadastrar($dadosForm);
        
        
        
        $insert = $this->usuario->create($novoUsuario);
        
        if($dadosForm['classe'] === 'Sindico'){
            if($insert)
                return redirect()->route('login.index')->with('mensagemSUCESSO', 'Cadastro Realizado com Sucesso!');
            else
                return redirect()->route('painel.cadastrar');
        }else {
            if ($insert) {
                return redirect()->route('condomino.cadastro')->with('mensagemSUCESSO', 'Cadastro Realizado com Sucesso!');
            }
        }
        
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit()
    {
        return view('dashboard.perfil');
    }

 
    public function update(UsuarioFormRequest $request, $id)
    {
        $dadosForm = $request->all();

        $usuario = $this->usuario->find($id);
        $usuario = $usuario->fill($request->all());
        $update = $usuario->save();

        if ($update){
            $usuario = DB::table('usuarios')
                     ->select('*')
                     ->where('email', '=', $dadosForm['email'])
                     ->get()
                     ->first();
            
            if ($usuario){   
                $_SESSION['usuario'] = $usuario;
            }
            return Redirect()->route('dashboard.home')->with('mensagemSUCESSO', 'Seu perfil foi atualizado com sucesso!');
        }else{
            return redirect()->route('perfil.editar');
        }

    }

 
    public function destroy($id)
    {
        $usuario = $this->usuario->find($id);
        
        if($usuario->id === $_SESSION['usuario']->id) {
            return redirect()->route('condomino.index')->with('mensagemErroDELETE', 'Você não pode excluir a si próprio!');
        }

        $delete = $usuario->delete();
        
        if($delete)
            return redirect()->route('condomino.index')->with('mensagemSucessoDELETE', 'Usuário deletado com sucesso!');
        else
            return redirect()->route('condomino.index')->with('mensagemErroDELETE', 'Ops! Algo aconteceu de errado na exclusão do usuário!');
    }

}
