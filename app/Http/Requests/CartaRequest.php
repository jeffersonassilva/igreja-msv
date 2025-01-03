<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartaRequest extends FormRequest
{
    const NULLABLE_STRING_MAX30 = 'nullable|string|max:30';

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
            'titulo' => 'required|string|max:40',
            'nome' => 'required|string|max:255',
            'cargo' => self::NULLABLE_STRING_MAX30,
            'cargo_assinatura1' => self::NULLABLE_STRING_MAX30,
            'nome_assinatura1' => self::NULLABLE_STRING_MAX30,
            'cargo_assinatura2' => self::NULLABLE_STRING_MAX30,
            'nome_assinatura2' => self::NULLABLE_STRING_MAX30,
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'titulo' => 'Título',
            'nome' => 'Nome',
            'cargo' => 'Forma de Tratamento',
            'cargo_assinatura1' => 'Cargo 1ª Assinatura',
            'cargo_assinatura2' => 'Cargo 2ª Assinatura',
            'nome_assinatura1' => 'Nome 1ª Assinatura',
            'nome_assinatura2' => 'Nome 2ª Assinatura',
        ];
    }
}
