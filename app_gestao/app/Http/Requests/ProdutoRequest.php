<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:30',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 30 caracteres',
            'descricao.min' => 'O descrição nome deve ter no minimo 3 caracteres',
            'descricao.max' => 'O descrição nome deve ter no maximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um numero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];
    }
}
