<?php

namespace App\Models;

class AlunoClasse extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'aluno_classe';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'aluno_id',
        'classe_id',
    ];
}
