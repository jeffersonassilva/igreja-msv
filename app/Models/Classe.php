<?php

namespace App\Models;

class Classe extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'classes';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nome',
    ];
}
