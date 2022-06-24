<?php

namespace App\Models;

class Banner extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'banners';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'descricao',
        'img_mobile',
        'img_web',
        'link',
        'ordem',
        'data_inicial',
        'data_final',
    ];

    /**
     * @param $value
     * @return void
     */
    public function setOrdemAttribute($value)
    {
        if (!$value) {
            $banner = Banner::orderBy('ordem', 'desc')->first();
            $nrOrdem = $banner ? (int)$banner->ordem + 1 : 10;
            $this->attributes['ordem'] = $nrOrdem;
        }
    }
}
