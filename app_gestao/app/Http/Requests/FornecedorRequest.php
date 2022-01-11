<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return [

            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'O campo Nome deve ter no minimo 3 caracteres!',
            'nome.max' => 'O campo Nome deve ter no minimo 30 caracteres!',
            'uf.min' => 'O campo UF deve ter no minimo 2 caracteres!',
            'uf.max' => 'O campo UF deve ter no maximo 2 caracteres!',
            'nome.min' => 'O campo email é obrigatório!',
        ];
    }
}
