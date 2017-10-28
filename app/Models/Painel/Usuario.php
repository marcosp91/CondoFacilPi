<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

Class Usuario extends Model
{   
   
    protected $table = 'usuarios';
    protected $fillable = ['nome','cpf','email','telefone','endereco','num_residencia', 'bloco', 'cidade', 'estado', 'cep', 'senha', 'privilegio','condominio_id', 'updated_at','created_at'];
    
    
}
