<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
