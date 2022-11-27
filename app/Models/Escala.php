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
        'fechada',
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
        $corDefault = '#777777'; // 6=Mutirao e etc...
        $cores = array(
            1 => '#ff8537', // Limpeza do Templo
            2 => '#00d5ff', // Culto Público
            3 => '#e969ff', // Mulheres
            4 => '#355bf0', // Imersão
            5 => '#53c98a', // EBD
            7 => '#c9b73b', // Santa Ceia
            8 => '#ed143d', // Seminário de Casais
            9 => '#5d33a4', // Conferência de Louvor
            10 => '#92400e', // Professor EBD
            11 => '#5d33a4', // Conexão Jovem
            12 => '#5d33a4', // Conferência KIDS
        );

        return $cores[$this->evento_id] ?? $corDefault;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voluntarios()
    {
        return $this->hasMany(EscalaVoluntario::class, 'escala_id', 'id')
            ->has('voluntario')
            ->with('usuario');
    }
}
