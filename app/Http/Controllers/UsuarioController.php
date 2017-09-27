<?php

namespace App\Http\Controllers;

use App\Models\Painel\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Painel\UsuarioFormRequest;
use function dd;
use function redirect;
use function validator;
use function view;

class UsuarioController extends Controller
{
    private $usuario;
    
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index()
    {
        $usuarios = $this->usuario->all();
        dd($usuarios);
        return view('Painel.index', compact('usuarios'));
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
        $dadosForm['privilegio'] = (!isset($_SESSION['usuario'])) ? 1 : 0;
        
        
        $menssagemErros = [
            'nome.required' => 'O campo nome é de preenchimento obrigatório!',
            'email.required' => 'O campo email é de preenchimento obrigatório!',
            'senha.required' => 'O campo senha é de preenchimento obrigatório!',
            'senha-confirm.required' => 'Por favor, confirme sua senha!',
        ];
        
        $validacao = validator($dadosForm, $this->usuario->regras, $menssagemErros);
        if ($validacao->fails()){
            return redirect()->route('painel.cadastrar')
                ->withErrors($validacao)
                ->withInput();
        }
        
        //$dadosForm['senha'] = Hash::make('password');
        
        $insert = $this->usuario->create($dadosForm);
        
        if($insert)
            return redirect()->route('login.index');
        else
            return redirect()->route('painel.cadastrar');
        
        
        //return redirect()->route('/dashboard')->with('message', 'Usuário criado com sucesso!');
        
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
        
        /**Utilizando novo metodo da classe UsuarioFormRequest para validação**/

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
        
        $update = $usuario->save();
     
        if ($update){
            $usuario = DB::table('usuarios')
                     ->select('*')
                     ->where('email', '=', $dadosForm['email'])
                     ->get()
                     ->first();
        
            if ($usuario){
                session_start();    
                $_SESSION['usuario'] = $usuario;
            }
            return redirect()->route('perfil.editar');
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
