<?php

namespace App\Models;

class Testemunho extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'testemunhos';

    /**
     * @var string
     */
    protected $perPage = '10';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'mensagem',
        'situacao',
    ];
}
