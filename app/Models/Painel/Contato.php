<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
	protected $table = 'contatos_landing';
	protected $fillable = ['nome', 'email', 'comentario'];
	
	public $timestamps = false;
}
