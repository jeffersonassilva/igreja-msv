<?php

namespace App\Models;

class Voluntario extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'voluntarios';

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
        'foto',
        'sexo',
        'professor_ebd',
        'observacao',
    ];
}
