<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CampanhaRequest
 * @package App\Http\Requests
 */
class CampanhaRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'data' => 'required|date',
            'periodo' => 'required|max:15',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'data' => 'Data',
            'periodo' => 'Período',
        ];
    }
}
