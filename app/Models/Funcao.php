<?php

namespace App\Models;

class Funcao extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'escala_funcao';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'abreviacao',
        'descricao',
        'situacao',
    ];
}
