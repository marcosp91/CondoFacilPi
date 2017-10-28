<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'  => 'required|min:3|max:100',
            'cpf' => 'cpf',
            'telefone' => 'required|unique:usuarios,telefone',
            'email' => 'required|email|unique:usuarios,email',
        ];
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'Preenchimento obrigatório!',
            'nome.min' => 'Nome deve conter mais que 03 (três) caracteres!',
            'nome.max' => 'Nome não deve conter mais que 100 caracteres!',
            'email.required' => 'Preenchimento obrigatório!',
            'email.unique' => 'Já existe um usuário com este email!',
            'telefone.unique' => 'Já existe um usuário com este telefone!',
            'telefone.required' => 'Preenchimento obrigatório!',
        ];
        
    }
    
}
