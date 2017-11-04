<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class AreaFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'  => 'required|min:3|max:200',
            'descricao' => 'required',
           
        ];
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'Preenchimento obrigatório!',
            'nome.min' => 'Nome deve conter mais que 03 (três) caracteres!',
            'nome.max' => 'Nome não deve conter mais que 100 caracteres!',
            'descricao.required' => 'Preenchimento obrigatório!',           
        ];
        
    }
}
