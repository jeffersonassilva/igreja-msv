<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropositoRequest extends FormRequest
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
            'titulo' => 'required|max:30',
            'descricao' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'titulo' => 'Título',
            'descricao' => 'Descrição',
        ];
    }
}
