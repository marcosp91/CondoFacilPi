<?php

namespace App\Models\Painel;



class Sindico extends Usuario
{
    protected $fillable = ['id','nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    
    
    public $regras = [
            'nome'  => 'required|min:3|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
            'senha-confirm' => 'required|same:senha',
    ];
    
    public $menssagemErros = [
            'nome.required' => 'Preenchimento obrigatório!',
            'nome.min' => 'Nome deve conter mais que 03 (três) caracteres!',
            'nome.max' => 'Nome não deve conter mais que 100 caracteres!',
            'email.required' => 'Preenchimento obrigatório!',
            'email.unique' => 'Já existe um usuário com este email!',
            'senha.required' => 'Preenchimento obrigatório!',
            'senha-confirm.required' => 'Preenchimento obrigatório',
            'senha.min' => 'Mínimo 6 caracteres!',
            'senha-confirm.same' => 'A confirmação de senha não confere!',
        ];
    
    public function cadastrar($dadosForm) {
        $dadosForm['privilegio'] = 1;
          
        return $dadosForm;
    }
}
