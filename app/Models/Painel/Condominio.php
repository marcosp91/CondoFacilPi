<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    protected $fillable = ['nome','cnpj','endereco','numero', 'complemento','cidade','estado','cep','telefone'];
    public $timestamps = false;
    //protected $guarded = ['id', 'created_at', 'update_at'];
    
    public $regras = [
        'nome'  => 'required|min:3|max:100',
        'cnpj' => 'required|cnpj',
        'telefone' => 'required',
        'tipo' => 'required',
        'endereco' => 'required|min:3',
        'numero' => 'required',
        'complemento' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
    ];
}
