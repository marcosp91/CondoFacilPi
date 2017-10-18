<?php

namespace App\Http\Controllers;

use App\Models\Painel\Aviso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;

class AvisoController extends Controller
{
    private $aviso;
    
    public function __construct(Aviso $aviso)
    {
        $this->aviso = $aviso;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Aviso $aviso)
    {
            $avisos = DB::table('avisos')
            ->join('usuarios', 'avisos.id_usuario', '=', 'usuarios.id')
            ->select('avisos.*', 'usuarios.nome')
            ->get();
            
            return view('dashboard.aviso', compact('avisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {   
        $aviso = $this->aviso->find($id);
        
        $delete = $aviso->delete();
        
        if($delete)
            return redirect()->route('avisos.index')->with('mensagemSucessoDELETE', 'Aviso Deletado com Sucesso!');
        else
            return redirect()->route('avisos.index')->with('mensagemErroDELETE', 'Algo deu Errado na Exclusão do Aviso!');
    }
}
