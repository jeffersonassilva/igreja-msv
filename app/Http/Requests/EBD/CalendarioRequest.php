<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

class CalendarioRequest extends FormRequest
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
            'data' => 'date',
            'responsavel' => 'required|max:255',
            'secretario' => 'required|max:255',
            'classes' => 'required|array',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'data' => 'Data',
            'responsavel' => 'Responsável pela EBD',
            'secretario' => 'Responsável pela Secretaria',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'classes.required' => 'É necessário marcar quais são as classes que terão aula nesse dia.',
        ];
    }
}
