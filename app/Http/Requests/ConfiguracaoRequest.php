<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ConfiguracaoRequest extends FormRequest
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
            'current-password' => 'required|current_password',
            'new-password' => ['required', 'confirmed', Password::min(8)],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'current-password' => 'Senha atual',
            'new-password' => 'Nova senha',
        ];
    }
}
