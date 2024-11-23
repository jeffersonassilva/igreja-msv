<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncaoRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'abreviacao' => 'required|max:3',
            'descricao' => 'required|max:50',
            'situacao' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'abreviacao' => 'Abreviação',
            'descricao' => 'Descrição',
            'situacao' => 'Situação',
        ];
    }
}
