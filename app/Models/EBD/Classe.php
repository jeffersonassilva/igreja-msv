<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'faixa_etaria',
        'revista',
        'link',
    ];

    /**
     * @return BelongsToMany
     */
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, AlunoClasse::class, 'classe_id', 'aluno_id');
    }
}
