<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;

class Professor extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'ebd_professores';

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, ProfessorClasse::class);
    }
}
