<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class VoluntarioRequest
 * @package App\Http\Requests
 */
class VoluntarioRequest extends FormRequest
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
            'sexo' => ['required', Rule::in(['M', 'F'])],
            'professor_ebd' => ['required', Rule::in(['0', '1'])],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'professor_ebd' => 'Professor EBD',
        ];
    }
}
