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
        'img_mobile',
        'img_web',
        'link',
        'data_inicial',
        'data_final',
    ];
}
