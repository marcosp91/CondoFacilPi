<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{   
   
    //protected $table = 'usuarios';
    //protected $primaryKey = 'id';
    //protected $fillable = ['id','nome','cpf','email','num_residencia','bloco','rua', 'cidade', 'cep', 'estado', 'id_condominio', 'senha', 'telefone','privilegio'];
    protected $fillable = ['id','nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    
    
    public $regras = [
        'nome'  => 'required|min:3|max:100',
        'email' => 'required|email',
        'senha' => 'required|min:6',
        'senha-confirm' => 'required|same:senha',
    ];
    
    /**Novo Método na classe UsuarioFormRequest**\
    /*public $regrasEdit = [
        
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
    ];*/
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getNumResidencia() {
        return $this->numResidencia;
    }

    function getBloco() {
        return $this->bloco;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPrivilegio() {
        return $this->privilegio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNumResidencia($numResidencia) {
        $this->numResidencia = $numResidencia;
    }

    function setBloco($bloco) {
        $this->bloco = $bloco;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPrivilegio($privilegio) {
        $this->privilegio = $privilegio;
    }


}
