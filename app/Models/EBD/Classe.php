<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;

class Classe extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'ebd_classes';

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
        'revista',
    ];
}
