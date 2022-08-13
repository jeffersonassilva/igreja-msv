<?php

namespace App\Models;

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
        'situacao',
        'evento_id',
    ];

    protected $appends = [
        'cor_indicacao',
    ];

    /**
     * @return string
     */
    public function getCorIndicacaoAttribute()
    {
        switch ($this->evento_id) {
            case 1: //Limpeza do Templo
                $color = '#ff8537';
                break;
            case 2: //Culto publico
                $color = '#00d5ff';
                break;
            case 3: //Mulheres
                $color = '#e969ff';
                break;
            default:
                $color = '#333';
                break;
        }

        return $color;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class, 'escala_id', 'id');
    }
}
