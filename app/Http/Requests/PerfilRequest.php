<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PerfilRequest
 * @package App\Http\Requests
 */
class PerfilRequest extends FormRequest
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
            'descricao' => 'required|max:100',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'descricao' => 'Descrição',
        ];
    }
}
