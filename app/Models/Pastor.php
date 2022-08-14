<?php

namespace App\Models;

class Pastor extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'pastor';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
    ];
}
