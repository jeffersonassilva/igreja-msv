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
            'arquivo' => 'required|mimes:jpg,jpeg,png,pdf',
            'forma_pagamento' => 'required',
            'membro_id' => 'required',
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
            'forma_pagamento' => 'Forma de Pagamento',
            'membro_id' => 'Responsável pelo envio',
        ];
    }
}
