<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificadoRequest extends FormRequest
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
            'tipo' => 'required',
            'titulo' => 'required|string|max:30',
            'nome' => 'required|string|max:40',
            'mensagem' => 'required|string|max:1000',
            'cargo_assinatura' => 'nullable|string|max:30',
            'nome_assinatura' => 'nullable|string|max:30',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'tipo' => 'Tipo do Certificado',
            'titulo' => 'Título',
            'nome' => 'Nome',
            'mensagem' => 'Mensagem',
            'cargo_assinatura' => 'Cargo 1ª Assinatura',
            'nome_assinatura' => 'Nome 1ª Assinatura',
        ];
    }
}
