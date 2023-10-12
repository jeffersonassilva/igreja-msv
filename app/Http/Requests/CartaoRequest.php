<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CartaoRequest
 * @package App\Http\Requests
 */
class CartaoRequest extends FormRequest
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
            'identificador' => 'required|max:20',
            'numero' => 'required|max:16',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'identificador' => 'Identificador',
            'numero' => 'Número',
        ];
    }
}
