<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitanteRequest extends FormRequest
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
            'recomendacao' => 'nullable',
            'dt_visita' => $this->isMethod('put') ? 'date' : 'required|date',
            'nome' => $this->isMethod('put') ? self::MAX_255 : 'required|max:255',
            'dt_nascimento' => 'nullable|date',
            'endereco' => self::MAX_255,
            'telefone' => 'max:15',
            'responsavel' => self::MAX_255,
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
