<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class NotaFiscalRequest
 * @package App\Http\Requests
 */
class NotaFiscalRequest extends FormRequest
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
            'data' => 'required',
            'valor' => 'required',
            'descricao' => 'required',
            'categoria' => 'required',
            'arquivo' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'data' => 'Data da compra',
            'valor' => 'Valor da compra',
            'descricao' => 'Descrição da compra',
            'categoria' => 'Categoria',
            'arquivo' => 'Arquivo',
        ];
    }
}
