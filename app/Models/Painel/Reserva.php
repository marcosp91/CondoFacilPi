<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    public $timestamps = false;
    protected $fillable = ['motivo', 'data', 'observacao', 'id_area', 'id_usuario', 'id_condominio'];
}
