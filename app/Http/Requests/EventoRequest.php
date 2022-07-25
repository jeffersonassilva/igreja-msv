<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EventoRequest
 * @package App\Http\Requests
 */
class EventoRequest extends FormRequest
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
            'descricao' => 'required|max:150',
            'situacao' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'descricao' => 'Descrição',
            'situacao' => 'Situação',
        ];
    }
}
