<?php

namespace App\Models\Painel;

use function dd;
use function redirect;
use function validator;

class Sindico extends Usuario
{
    protected $fillable = ['id','nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    
    
    public $regras = [
        'nome'  => 'required|min:3|max:100',
        'email' => 'required|email',
        'senha' => 'required|min:6',
        'senha-confirm' => 'required|same:senha',
    ];
    
    public $menssagemErros = [
            'nome.required' => 'O campo nome é de preenchimento obrigatório!',
            'email.required' => 'O campo email é de preenchimento obrigatório!',
            'senha.required' => 'O campo senha é de preenchimento obrigatório!',
            'senha-confirm.required' => 'Por favor, confirme sua senha!',
        ];
    
    public function cadastrar($dadosForm) {
        $dadosForm['privilegio'] = 1;
          
        return $dadosForm;
    }
}
