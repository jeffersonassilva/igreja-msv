<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EscalaRequest
 * @package App\Http\Requests
 */
class EscalaRequest extends FormRequest
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
            'dt_escala' => 'required|date|after:yesterday',
            'hr_escala' => 'required',
            'evento_id' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'dt_escala' => 'Data',
            'hr_escala' => 'Hora',
            'evento_id' => 'Evento',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'dt_escala.after' => 'O campo :attribute não pode ser uma data retroativa.',
        ];
    }
}
