<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * @return BelongsToMany
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, ProfessorClasse::class);
    }
}
