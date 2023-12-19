<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class VisitanteRequest
 * @package App\Http\Requests
 */
class VisitanteRequest extends FormRequest
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
            'recomendacao' => 'nullable',
            'dt_visita' => $this->isMethod('put') ? 'date' : 'required|date',
            'nome' => $this->isMethod('put') ? 'max:255' : 'required|max:255',
            'dt_nascimento' => 'nullable|date',
            'endereco' => 'max:255',
            'telefone' => 'max:15',
            'responsavel' => 'max:255',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'recomendacao' => 'Recomendação',
            'dt_visita' => 'Data da visita',
            'nome' => 'Nome',
            'dt_nascimento' => 'Data de Nascimento',
            'endereco' => 'Endereço',
            'telefone' => 'Telefone',
            'responsavel' => 'Responsável',
        ];
    }
}
