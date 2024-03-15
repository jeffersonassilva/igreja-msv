<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CalendarioFixoRequest
 * @package App\Http\Requests
 */
class CalendarioFixoRequest extends FormRequest
{
    const NULLABLE_MAX_255 = 'nullable|max:255';

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
            'titulo' => 'required|max:255',
            'tema' => self::NULLABLE_MAX_255,
            'local' => self::NULLABLE_MAX_255,
            'link' => self::NULLABLE_MAX_255,
            'professor_id' => 'required',
            'classe_id' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'titulo' => 'Título',
            'tema' => 'Tema',
            'local' => 'Local',
            'link' => 'Link',
            'professor_id' => 'Professor',
            'classe_id' => 'Classe',
        ];
    }
}
