<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escala extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'escalas';

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
        'fechada',
        'evento_id',
        'dirigente',
        'pregador',
        'tema',
        'ministro',
    ];

    /**
     * @return BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }

    /**
     * @return Builder|HasMany
     */
    public function voluntarios()
    {
        return $this->hasMany(EscalaVoluntario::class, 'escala_id', 'id')
            ->has('voluntario')
            ->with('usuario');
    }
}
