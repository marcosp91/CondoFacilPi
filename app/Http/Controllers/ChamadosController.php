<?php

namespace App\Http\Controllers;

use App\Http\Requests\Painel\AvisosFormRequest;
use App\Models\Painel\Chamado;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;

session_start();
class ChamadosController extends Controller
{
	private $chamado;

	public function __construct(Chamado $chamado)
	{
		$this->chamado = $chamado;
	}

	public function chamados() 
	{

        return view('dashboard.chamados');
    }


	public function cadastrarChamado(AvisosFormRequest $request){
        $dadosForm = $request->all();
        $novoChamado = $this->chamado->publicaChamado($dadosForm);
        
        $insert = $this->chamado->create($novoChamado);
        if($insert){
            return redirect()->route('chamados.index')->with('mensagemSUCESSO', 'Sucesso!');
        }else{
            return redirect()->route('chamados.index')->with('mensagemERRO', 'Algo deu errado na publicação!');
        }
    }

    public function index(Chamado $chamado)
    {
        if ($_SESSION['usuario']->condominio_id != null) {
            $chamados = DB::table('chamados')
            ->join('usuarios', 'chamados.id_usuario', '=', 'usuarios.id')
            ->select('chamados.*', 'usuarios.nome')
            ->where('id_condominio', '=', $_SESSION['usuario']->condominio_id)
            ->get();
        }
        else{
            $chamados = array();
        }
            
            return view('dashboard.chamados', compact('chamados'));
    }


}
