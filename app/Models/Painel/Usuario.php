<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

Class Usuario extends Model
{   
   
    protected $table = 'usuarios';
    protected $fillable = ['nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    
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
    
}
