<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $ruleImgMobile = '|image|mimes:jpg,jpeg,png|dimensions:ratio=16/9|dimensions:min_width=640,min_height=360';
        $ruleImgWeb = '|image|mimes:jpg,jpeg,png|dimensions:ratio=24/5|dimensions:width=1920,height=400';

        return [
            'descricao' => 'required|max:100',
            'img_mobile' => (request()->isMethod('put') ? 'nullable' : 'required') . $ruleImgMobile,
            'img_web' => (request()->isMethod('put') ? 'nullable' : 'required') . $ruleImgWeb,
            'ordem' => 'nullable|numeric',
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
            'ordem' => 'Ordem',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        $msgImgMobileDimensions = 'A imagem deve respeitar a proporção de 16/9. Exs.: 640x360, 1280x720 e 1920x1080.';

        return [
            'img_mobile.dimensions' => $msgImgMobileDimensions,
            'img_web.dimensions' => 'A imagem deve ter o tamanho de 1920x400.',
        ];
    }
}
