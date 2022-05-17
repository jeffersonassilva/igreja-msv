<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TestemunhoRequest
 * @package App\Http\Requests
 */
class TestemunhoRequest extends FormRequest
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
            'telefone' => 'required|max:15',
            'mensagem' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'mensagem' => 'Mensagem',
        ];
    }
}
