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
        $rules = [
            'data' => 'date',
            'professor_id' => 'nullable',
            'tema' => 'nullable|max:255',
            'monitor' => 'nullable|max:255',
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
            'monitor' => 'Monitor(a)',
            'classe_id' => 'Classe',
            'classes' => 'Classes',
        ];
    }
}
