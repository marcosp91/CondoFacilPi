<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['nome', 'descricao', 'id_condominio'];
}
