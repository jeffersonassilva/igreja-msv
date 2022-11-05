<?php

namespace App\Models;

class EscalaVoluntario extends AbstractModel
{
    const COMPARECIMENTO_PRESENTE = 'P';
    const COMPARECIMENTO_FALTA = 'F';
    const COMPARECIMENTO_FALTA_JUSTIFICADA = 'FJ';

    /**
     * @var string
     */
    protected $table = 'escala_voluntario';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'funcao',
        'voluntario_id',
        'escala_id',
        'user_id',
        'comparecimento',
        'justificativa',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'voluntario_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
