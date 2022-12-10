<?php

namespace App\Models;

class Disponibilidade extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'disponibilidades';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var bool
     */
    protected $softDelete = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'voluntario_id',
        'dia',
    ];
}
