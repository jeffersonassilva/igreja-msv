<?php

namespace App\Http\Requests\EBD;

use Illuminate\Foundation\Http\FormRequest;

class ClasseRequest extends FormRequest
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
            'faixa_etaria' => 'required|max:255',
            'revista' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'faixa_etaria' => 'Faixa Etária',
            'revista' => 'Revista',
        ];
    }
}
