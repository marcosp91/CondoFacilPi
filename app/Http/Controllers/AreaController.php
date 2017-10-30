<?php

namespace App\Http\Controllers;

use App\Models\Painel\Area;
use App\Http\Requests\Painel\AreaFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function dd;
use function redirect;
use function view;

session_start();
class AreaController extends Controller
{
    private $area;
    
    public function __construct(Area $area)
    {
        $this->area = $area;
    }

	 public function index(Area $area) 
    {
        if ($_SESSION['usuario']->condominio_id != null) {
            $areas = DB::table('areas')
            ->select('areas.*')
            ->where('id_condominio', '=', $_SESSION['usuario']->condominio_id)
            ->get();
        }
        else{
            $areas = array();
        }
    
            return view('dashboard.cadastro.areaComum', compact('areas'));
             
    }

   	public function reservarAreaComum() 
    {
        return view('dashboard.cadastro.reservaArea');
    }
    
    public function store(AreaFormRequest $request) {
        
        $dadosForm = $request->all();
        $area = $dadosForm;
        $area['id_condominio'] = $_SESSION['usuario']->condominio_id;

        $insert = $this->area->create($area);
        
        if($insert)
            return redirect()->route('area.index')->with('mensagemSucessoDELETE', 'Área cadastrada com sucesso!');
        else
            return redirect()->route('area.index')->with('mensagemErroDELETE', 'Algo deu errado no cadastro da área!');
    }
    
    public function destroy($id)
    {   
        $area = $this->area->find($id);
        //dd($area);
        $delete = $area->delete();
        
        if($delete)
            return redirect()->route('area.index')->with('mensagemSucessoDELETE', 'Área deletada com sucesso!');
        else
            return redirect()->route('area.index')->with('mensagemErroDELETE', 'Algo deu errado na exclusão da área!');
    }
    
}
