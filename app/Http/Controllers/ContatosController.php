<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painel\Contato;
use Illuminate\Support\Facades\DB;
use function redirect;
use function view;


class ContatosController extends Controller
{
    private $contato;

	public function __construct(Contato $contato)
	{
		$this->contato = $contato;
	}

	public function insereContato(Request $request)
	{
		$dadosForm = $request->all();
		$novoContato = $dadosForm;

		$insert = $this->contato->create($novoContato);
		if($insert){

			$pathToFile = DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'ebook.pdf';
			return response()->download($pathToFile);

			//return redirect()->route('index.landing');
		}

	}
}
