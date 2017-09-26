<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class CondominioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'  => 'required|min:3|max:100',
            'cnpj' => 'required|cnpj',
            'telefone' => 'required',
            'tipo' => 'required',
            'endereco' => 'required|min:3',
            'numero' => 'required',
            'complemento' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'Preenchimento obrigatório!',
            'email.required' => 'Preenchimento obrigatório!',
            'telefone.required' => 'Preenchimento obrigatório!',
            'cnpj.required' => 'Preenchimento obrigatório!',
            'complemento.required' => 'Preenchimento obrigatório!',
            'endereco.required' => 'Preenchimento obrigatório!',
            'tipo.required' => 'Preenchimento obrigatório!',
            'numero.required' => 'Preenchimento obrigatório!',
            'cidade.required' => 'Preenchimento obrigatório!',            
            'estado.required' => 'Preenchimento obrigatório!',
            'cep.required' => 'Preenchimento obrigatório!',
        ];
        
    }
    
    
}
