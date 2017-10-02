<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

Class Usuario extends Model
{   
   
    //protected $table = 'usuarios';
    //protected $primaryKey = 'id';
    //protected $fillable = ['id','nome','cpf','email','num_residencia','bloco','rua', 'cidade', 'cep', 'estado', 'id_condominio', 'senha', 'telefone','privilegio'];
    protected $fillable = ['nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    
    
    /*public $regras = [
        'nome'  => 'required|min:3|max:100',
        'email' => 'required|email',
        'senha' => 'required|min:6',
        'senha-confirm' => 'required|same:senha',
    ];*/
    



}
