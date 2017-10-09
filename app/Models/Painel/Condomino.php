<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Condomino extends Model
{
    public $regras = [
    'nome'  => 'required|min:3|max:100',
    'email' => 'required|email',
    'cpf' => 'required|cpf',
    'num_residencia' => 'required',
    'bloco' => 'required',
    'endereco' => 'required',
    'cidade' => 'required',
    'cep' => 'required',
    'estado' => 'required',
    'telefone' => 'required',
    'complemento' => 'required',
    ];
    
    public $menssagemErros = [
    'nome.required' => 'Preenchimento obrigatório!',
    'email.required' => 'Preenchimento obrigatório!',
    'telefone.required' => 'Preenchimento obrigatório!',
    'cpf.required' => 'Preenchimento obrigatório!',
    'complemento.required' => 'Preenchimento obrigatório!',
    'bloco.required' => 'Preenchimento obrigatório!',
    'endereco.required' => 'Preenchimento obrigatório!',
    'cidade.required' => 'Preenchimento obrigatório!',
    'num_residencia.required' => 'Preenchimento obrigatório!',
    'estado.required' => 'Preenchimento obrigatório!',
    'cep.required' => 'Preenchimento obrigatório!',
    ];
    
    public function cadastrar($dadosForm) {
        $dadosForm['privilegio'] = 0;
        $dadosForm['condominio_id'] = $_SESSION['usuario']->condominio_id;
          
        return $dadosForm;
    }
}
