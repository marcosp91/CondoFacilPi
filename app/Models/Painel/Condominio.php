<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    protected $fillable = ['nome','cnpj','cep','endereco','numero','bairro','cidade','uf'];
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    public $regras = [
        
        'nome'  => 'required|min:3|max:100',
        'cnpj' => 'required|cnpj',
        'cep' => 'required',
        'endereco' => 'required|min:3',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'uf' => 'required',
    ];
}
