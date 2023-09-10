<?php

namespace App\Models;

class NotaFiscal extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'notas_fiscais';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'data',
        'descricao',
        'categoria',
        'observacao',
        'arquivo',
        'verificada',
    ];
}
