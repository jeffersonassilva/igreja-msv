<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MembroRequest
 * @package App\Http\Requests
 */
class MembroRequest extends FormRequest
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
            'sexo' => 'required',
            'estado_civil' => 'max:1',
            'dt_nascimento' => 'nullable|date',
            'dt_casamento' => 'nullable|date',
            'cep' => 'max:8',
            'logradouro' => 'max:255',
            'numero' => 'max:10',
            'complemento' => 'max:255',
            'bairro' => 'max:255',
            'cidade' => 'max:255',
            'uf' => 'max:2',
            'pais' => 'max:255',
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
