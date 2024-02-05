<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ClasseCalendarioRequest
 * @package App\Http\Requests
 */
class ClasseCalendarioRequest extends FormRequest
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
            'professor' => 'nullable|max:255',
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
            'professor' => 'Professor',
            'classe_id' => 'Classe',
            'classes' => 'Classes',
        ];
    }
}
