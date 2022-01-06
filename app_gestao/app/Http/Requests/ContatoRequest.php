<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'name' => 'required|min:3|max:30|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'message' => 'required|min:1|max:255',
        ];
    }
    public function messages()
    {

        return [

            'name.unique' => 'Nome obrigatório',
            'name.min' => 'O campo deve ter no minimo 3 caracteres',
            'name.max' => 'O campo deve ter no maximo 30 caracteres',

            'email.email' => 'O email informado não e valido',

            'message.max' => 'A mensagem deve possuir no máximo 255 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

    }
}
