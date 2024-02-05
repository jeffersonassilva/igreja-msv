<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;

class AlunoClasse extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'ebd_aluno_classe';

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
