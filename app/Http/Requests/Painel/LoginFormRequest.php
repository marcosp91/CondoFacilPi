<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'  => 'required|min:3|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
            'senha-confirm' => 'required|same:senha',
        ];
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'Preenchimento obrigatório!',
            'email.required' => 'Preenchimento obrigatório!',
            'email.unique' => 'Já existe um usuário com este email!',
            'senha.required' => 'Preenchimento obrigatório!',
            'senha-confirm.required' => 'Preenchimento obrigatório',
            'senha.min' => 'Mínimo 6 caracteres!',
            'senha-confirm.same' => 'A confirmação de senha não confere!',

           
        ];
        
    }
}
