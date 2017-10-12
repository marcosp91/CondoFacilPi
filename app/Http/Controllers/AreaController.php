<?php

namespace App\Http\Controllers;

use App\Models\Painel\Area;
use Illuminate\Http\Request;
use function redirect;
use function view;

session_start();
class AreaController extends Controller
{
    public function index(Area $area)
    {
            $areas = $area->all();
            
            return view('dashboard.cadastro.areaComum', compact('areas'));
    }
    
    public function store(Request $request)
    {
        $dadosForm = $request->all();   
        $dadosForm['id_condominio'] = $_SESSION['usuario']->condominio_id;
        
        $area = new Area();
        
        $insert = $area->create($dadosForm);
        
        if($insert){
            return redirect()->route('areaComum.index')->with('mensagemSUCESSO', 'Área cadastrada com sucesso!');
        }else{
            return redirect()->route('areaComum.index')->with('mensagemERRO', 'Algo deu errado no cadastro da Área!');
        }
    }
}
