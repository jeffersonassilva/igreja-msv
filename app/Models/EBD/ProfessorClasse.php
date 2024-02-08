<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;

class ProfessorClasse extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'ebd_professor_classe';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'professor_id',
        'classe_id',
    ];
}
