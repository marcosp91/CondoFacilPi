<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

 class Chamado extends Model
{
    
 	protected $table = 'chamados';
    protected $fillable = ['assunto', 'id_usuario', 'id_condominio', 'status', 'tipo', 'descricao', 'created_at'];

    public function publicaChamado($dadosForm) {
        
        $dadosForm['id_usuario'] = $_SESSION['usuario']->id;
        $dadosForm['id_condominio'] = $_SESSION['usuario']->condominio_id;
        
        return $dadosForm;
        
    }   
}
