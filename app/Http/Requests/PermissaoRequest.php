<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissaoRequest extends FormRequest
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
            'descricao' => 'required|max:150',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'descricao' => 'Descrição',
        ];
    }
}
