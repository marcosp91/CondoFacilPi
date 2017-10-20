<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class AvisosFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descricao'  => 'required|min:3|max:200',
            //'mensagem' => 'required',
           
        ];
    }
    
    public function messages()
    {
        return [
            'descricao.required' => 'Preenchimento obrigatório!',
            'descricao.min' => 'Descrição deve conter mais que 03 (três) caracteres!',
            'descricao.max' => 'Descrição não deve conter mais que 100 caracteres!',
            //'mensagem.required' => 'Preenchimento obrigatório!',           
        ];
        
    }
}
