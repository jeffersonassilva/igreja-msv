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
            case 4: //Imersão
                $color = '#355bf0';
                break;
            case 5: //EBD
                $color = '#42cb82';
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
        return $this->hasMany(EscalaVoluntario::class, 'escala_id', 'id')->has('voluntario');
    }
}
