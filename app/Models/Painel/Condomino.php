<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use Keygen;

class Condomino extends Model
{
    public $regras = [
            'nome'  => 'required|min:3|max:100',
            'cpf' => 'cpf',
            'telefone' => 'required|unique:usuarios,telefone',
            'email' => 'required|email|unique:usuarios,email',
        ];
    
    
    public $menssagemErros = [
            'nome.required' => 'Preenchimento obrigatório!',
            'nome.min' => 'Nome deve conter mais que 03 (três) caracteres!',
            'nome.max' => 'Nome não deve conter mais que 100 caracteres!',
            'email.required' => 'Preenchimento obrigatório!',
            'email.unique' => 'Já existe um usuário com este email!',
            'telefone.unique' => 'Já existe um usuário com este telefone!',
            'telefone.required' => 'Preenchimento obrigatório!',
        ];
    
    public function cadastrar($dadosForm) {
        $dadosForm['privilegio'] = 0;
        $dadosForm['condominio_id'] = $_SESSION['usuario']->condominio_id;
        $dadosForm['senha'] = Keygen::numeric(8)->generate();
        
        return $dadosForm;
    }
}
