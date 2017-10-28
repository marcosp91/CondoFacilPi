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
        $usuarios = $usuario->all()->where('condominio_id', '=', $_SESSION['usuario']->condominio_id);
        
        return view('dashboard.cadastro.condomino', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('auth.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        return view('dashboard.perfil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UsuarioFormRequest $request)
    {
        $dadosForm = $request->all();
        
        $usuario = $this->usuario->find($dadosForm['id']);
        $usuario->nome = $dadosForm['nome'];
        $usuario->cpf = $dadosForm['cpf'];
        $usuario->email = $dadosForm['email'];
        $usuario->telefone = $dadosForm['telefone'];
        $usuario->endereco = $dadosForm['endereco'];
        $usuario->num_residencia = $dadosForm['num_residencia'];
        $usuario->bloco = 'B';
        $usuario->cidade = $dadosForm['cidade'];
        $usuario->estado = $dadosForm['estado'];
        $usuario->cep = $dadosForm['cep'];
        
        //$usuario->updated_at = Carbon::createFromFormat('Y-m-d H', Carbon::now(), 'America/Sao_Paulo');
        $usuario->updated_at = Carbon::now(new DateTimeZone('America/Sao_Paulo'));
        
                
        $update = $usuario->save();

        if ($update){
            $usuario = DB::table('usuarios')
                     ->select('*')
                     ->where('email', '=', $dadosForm['email'])
                     ->get()
                     ->first();
        echo 'oi';
            if ($usuario){   
                $_SESSION['usuario'] = $usuario;
            }
            return Redirect()->route('dashboard.home')->with('mensagemSUCESSO', 'Perfil atualizado com sucesso!');
        }else{
            return redirect()->route('perfil.editar');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
