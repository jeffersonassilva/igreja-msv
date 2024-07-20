<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroRequest extends FormRequest
{
    const MAX_255 = 'max:255';

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
            'sexo' => 'required',
            'estado_civil' => 'max:1',
            'dt_nascimento' => 'nullable|date',
            'dt_casamento' => 'nullable|date',
            'cep' => 'max:9',
            'logradouro' => self::MAX_255,
            'numero' => 'max:10',
            'complemento' => self::MAX_255,
            'bairro' => self::MAX_255,
            'cidade' => self::MAX_255,
            'uf' => 'max:2',
            'pais' => self::MAX_255,
            'telefone' => 'max:15',
            'email' => 'nullable|email|max:255',
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
            'estado_civil' => 'Estado Civil',
            'dt_nascimento' => 'Data de Nascimento',
            'dt_casamento' => 'Data de Casamento',
            'cep' => 'CEP',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'pais' => 'País',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
        ];
    }
}
