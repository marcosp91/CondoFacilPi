<?php

namespace App\Http\Controllers;

use App\Models\Painel\Area;
use App\Http\Requests\Painel\AreaFormRequest;
use App\Http\Requests\Painel\ReservaFormRequest;
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

    public function indexEditar($id) {

        $area = $this->area->find($id);

        if ($area){
            return view('dashboard.editar.editarArea', compact('area'));
        }


    }

    public function update(Request $request, $id){
        $area = $this->area->find($id);
        $area->fill($request->all());
        $update = $area->save();

        if($update)
            return redirect()->route('area.index')->with('mensagemSUCESSO', 'Sua área foi atualizada com sucesso!');
        else
            return redirect()->route('areas.editar', $area->id)->with('mensagemERRO', 'Ops! Algo aconteceu de errado na atualização da sua área!');

    }

    public function store(AreaFormRequest $request) {
        
        $dadosForm = $request->all();
        $area = $dadosForm;
        $area['id_condominio'] = $_SESSION['usuario']->condominio_id;

        $insert = $this->area->create($area);
        
        if($insert)
            return redirect()->route('area.index')->with('mensagemSUCESSO', 'Nova Área cadastrada com sucesso!');
        else
            return redirect()->route('area.index')->with('mensagemERRO', 'Ops! Algo aconteceu de errado no cadastro da área!');
    }
    
    public function destroy($id)
    {   
        $area = $this->area->find($id);
        $delete = $area->delete();
        
        if($delete)
            return redirect()->route('area.index')->with('mensagemSUCESSO', 'Área Comum deletada com sucesso!');
        else
            return redirect()->route('area.index')->with('mensagemERRO', 'Ops! Algo aconteceu de errado na exclusão da área!');
    }
    
}
