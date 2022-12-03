<?php

namespace App\Models;

class Evento extends AbstractModel
{
    const EBD = 5;

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
    ];
}
