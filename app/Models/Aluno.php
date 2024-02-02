<?php

namespace App\Models;

class Aluno extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'alunos';

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
        'situacao',
    ];

    protected $with = [
        'classes'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, AlunoClasse::class);
    }
}
