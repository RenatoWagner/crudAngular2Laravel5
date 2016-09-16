<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PessoaForm extends Request
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
          "nome" => "required|between:5,60",
        ];
    }
    public function messages()
    {
        return [
            'nome.between' => 'The :attribute must be between :min - :max.',
            'nome.required' => 'The :attribute is required!',

        ];
    }
}
