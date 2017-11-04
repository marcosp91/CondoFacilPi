<?php

namespace App\Http\Controllers;

use App\Models\Painel\Reserva;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function redirect;
use function view;

session_start();
class ReservaController extends Controller
{
    private $reserva;
    
    public function __construct(Reserva $reserva) {
        $this->reserva = $reserva;
    }
    
    public function index() {
        if ($_SESSION['usuario']->condominio_id != null) {
            $areas = DB::table('areas')
            ->select('areas.*')
            ->where('id_condominio', '=', $_SESSION['usuario']->condominio_id)
            ->get();
        }
        else{
            $areas = array();
        }
        
        return view('dashboard.cadastro.reservaArea', compact('areas'));
    }
    
    public function store(Request $request) {
        $dadosForm = (object) $request->all();
        $dadosForm->id_usuario = $_SESSION['usuario']->id;
        $dadosForm->id_condominio = $_SESSION['usuario']->condominio_id;
        
        $reserva = DB::table('reservas')
            ->select('reservas.*')
            ->where('id_area', '=', $dadosForm->id_area)
            ->where('id_condominio', '=', $_SESSION['usuario']->condominio_id)
            ->where('data', '=', $dadosForm->data)
            ->get();
    
        if(isset($reserva[0])){
            return redirect()->route('reservaArea.index')->with('mensagemERRO', 'Esta data ja esta reservada!');
        }
        else{
            $insert = $this->reserva->create($dadosForm);
        }
        
        
        
        if($insert)
            return redirect()->route('reservaArea.index')->with('mensagemSUCESSO', 'Reserva cadastrada com sucesso!');
        else
            return redirect()->route('reservaArea.index')->with('mensagemERRO', 'Algo deu errado na sua reserva!');
    }
}
