<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CalendarioRequest
 * @package App\Http\Requests
 */
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
        $rules = [
            'data' => 'date',
            'professor_id' => 'nullable',
            'tema' => 'nullable|max:255',
        ];

        if ($this->_method === 'PUT') {
            $rules['classe_id'] = 'required';
        } else {
            $rules['classes'] = 'required|array';
        }

        return $rules;
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'data' => 'Data',
            'tema' => 'Tema',
            'professor_id' => 'Professor',
            'classe_id' => 'Classe',
            'classes' => 'Classes',
        ];
    }
}
