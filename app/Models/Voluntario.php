<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Voluntario extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'voluntarios';

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
        'foto',
        'sexo',
        'professor_ebd',
        'observacao',
        'situacao',
        'codigo',
    ];

    /**
     * @return HasMany
     */
    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidade::class, 'voluntario_id', 'id');
    }
}
