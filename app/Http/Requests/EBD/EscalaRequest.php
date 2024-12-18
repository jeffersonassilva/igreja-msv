<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

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
            'tema' => 'nullable|max:255',
            'monitor' => 'nullable|max:255',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'tema' => 'Tema',
            'monitor' => 'Monitor',
        ];
    }
}
