<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AlunoRequest
 * @package App\Http\Requests
 */
class AlunoRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'situacao' => 'nullable',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'situacao' => 'Situação',
        ];
    }
}
