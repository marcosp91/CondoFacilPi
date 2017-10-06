<?php

namespace App\Models\Painel;

class Aviso extends Publicacao
{
    
    protected $table = 'avisos';
    protected $fillable = ['descricao', 'mensagem', 'data_publicacao', 'id_usuario', 'id_condominio'];
    
    public function publicaMensagem($dadosForm) {
        
        $dadosForm['id_usuario'] = $_SESSION['usuario']->id;
        $dadosForm['id_condominio'] = $_SESSION['usuario']->condominio_id;
        
        
         return $dadosForm;
        
    }

}
