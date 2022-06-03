<?php

namespace App\Models;

class Proposito extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'propositos';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
    ];
}
