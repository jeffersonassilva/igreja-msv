<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BannerRequest
 * @package App\Http\Requests
 */
class BannerRequest extends FormRequest
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
            'descricao' => 'required|max:100',
            'img_mobile' => 'required|image|mimes:jpg,jpeg,png|dimensions:ratio=16/9|dimensions:min_width=640,min_height=360',
            'img_web' => 'required|image|mimes:jpg,jpeg,png|dimensions:ratio=24/5|dimensions:width=1920,height=400',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'descricao' => 'Descrição',
            'img_mobile' => 'Imagem Mobile',
            'img_web' => 'Imagem Web',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'img_mobile.dimensions' => 'A imagem deve respeitar a proporção de 16/9. Exs.: 640x360, 1280x720 e 1920x1080.',
            'img_web.dimensions' => 'A imagem deve ter o tamanho de 1920x400.',
        ];
    }
}
