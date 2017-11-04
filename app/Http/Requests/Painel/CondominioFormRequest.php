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
            'cnpj' => 'required|cnpj|unique:condominios,cnpj',
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
            'nome.min' => 'Nome deve conter mais que 03 (três) caracteres!',
            'nome.max' => 'Nome não deve conter mais que 100 caracteres!',
            'email.required' => 'Preenchimento obrigatório!',
            'telefone.required' => 'Preenchimento obrigatório!',
            'cnpj.required' => 'Preenchimento obrigatório!',
            'cnpj.unique' => 'Já existe um condomínio com este CNPJ!',
            'complemento.required' => 'Preenchimento obrigatório!',
            'endereco.required' => 'Preenchimento obrigatório!',
            'endereco.min' => 'Endereço deve conter mais que 03 (três) caracteres!',
            'endereco.max' => 'Endereço não deve conter mais que 100 caracteres!',
            'tipo.required' => 'Preenchimento obrigatório!',
            'numero.required' => 'Preenchimento obrigatório!',
            'cidade.required' => 'Preenchimento obrigatório!',            
            'estado.required' => 'Preenchimento obrigatório!',
            'cep.required' => 'Preenchimento obrigatório!',
        ];
        
    }
    
    
}
