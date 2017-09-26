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
            'email' => 'required|email',
            'cpf' => 'required|cpf',
            'num_residencia' => 'required',
            'bloco' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'cep' => 'required',
            'estado' => 'required',
            'telefone' => 'required',
            'complemento' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'Preenchimento obrigatório!',
            'email.required' => 'Preenchimento obrigatório!',
            'telefone.required' => 'Preenchimento obrigatório!',
            'cpf.required' => 'Preenchimento obrigatório!',
            'complemento.required' => 'Preenchimento obrigatório!',
            'bloco.required' => 'Preenchimento obrigatório!',
            'endereco.required' => 'Preenchimento obrigatório!',
            'cidade.required' => 'Preenchimento obrigatório!',
            'num_residencia.required' => 'Preenchimento obrigatório!',
            'estado.required' => 'Preenchimento obrigatório!',
            'cep.required' => 'Preenchimento obrigatório!',
        ];
        
    }
}
