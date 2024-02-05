<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ClasseRequest
 * @package App\Http\Requests
 */
class ClasseRequest extends FormRequest
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
            'nome' => 'required|max:50',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
        ];
    }
}
