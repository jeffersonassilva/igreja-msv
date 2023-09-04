<?php

namespace App\Models;

class Cartao extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'cartoes';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'identificador',
        'numero',
    ];
}
