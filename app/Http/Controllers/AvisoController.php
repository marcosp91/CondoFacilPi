<?php

namespace App\Http\Controllers;

use App\Models\Painel\Aviso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;

session_start();
class AvisoController extends Controller
{
    private $aviso;
    
    public function __construct(Aviso $aviso)
    {
        $this->aviso = $aviso;
    }
 
    public function index(Aviso $aviso)
    {
        if ($_SESSION['usuario']->condominio_id != null) {
            $avisos = DB::table('avisos')
            ->join('usuarios', 'avisos.id_usuario', '=', 'usuarios.id')
            ->select('avisos.*', 'usuarios.nome')
            ->where('id_condominio', '=', $_SESSION['usuario']->condominio_id)
            ->get();
        }
        else{
            $avisos = array();
        }
            
            return view('dashboard.aviso', compact('avisos'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {   
        $aviso = $this->aviso->find($id);
        
        $delete = $aviso->delete();
        
        if($delete)
            return redirect()->route('avisos.index')->with('mensagemSucessoDELETE', 'Aviso deletado com sucesso!');
        else
            return redirect()->route('avisos.index')->with('mensagemErroDELETE', 'Ops! Algo aconteceu de  errado na exclusão do Aviso!');
    }
}
