<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

abstract class Usuario extends Model
{   
    public $nome;
    public $email;    
    public $cpf;    
    public $num_residencia;
    public $bloco;
    public $endereco;
    public $cidade;
    public $cep;
    public $estado;
    public $telefone;
    public $complemento;
    //protected $table = 'usuarios';
    //protected $primaryKey = 'id';
    //protected $fillable = ['id','nome','cpf','email','num_residencia','bloco','rua', 'cidade', 'cep', 'estado', 'id_condominio', 'senha', 'telefone','privilegio'];
    protected $fillable = ['id','nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    
    
    abstract public function cadastrar();


}
