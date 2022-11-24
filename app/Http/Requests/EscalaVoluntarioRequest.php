<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EscalaVoluntarioRequest
 * @package App\Http\Requests
 */
class EscalaVoluntarioRequest extends FormRequest
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
            'voluntario_id' => 'required',
            'escala_id' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'voluntario_id' => 'Voluntário',
            'escala_id' => 'Evento',
        ];
    }
}
