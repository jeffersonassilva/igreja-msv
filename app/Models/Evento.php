<?php

namespace App\Models;

class Evento extends AbstractModel
{
    const SANTA_CEIA = 7;

    /**
     * @var string
     */
    protected $table = 'eventos';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'descricao',
        'situacao',
        'qntd_voluntarios',
    ];
}
