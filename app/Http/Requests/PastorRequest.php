<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PastorRequest
 * @package App\Http\Requests
 */
class PastorRequest extends FormRequest
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
            'titulo' => 'required|max:100',
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
