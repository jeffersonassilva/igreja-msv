<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartaRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'titulo' => 'Título',
            'nome' => 'Nome',
        ];
    }
}
