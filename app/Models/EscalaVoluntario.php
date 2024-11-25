<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'dispositivo_os',
        'dispositivo_versao',
        'dispositivo_nome',
        'dispositivo_modelo',
        'app_versao',
    ];

    protected $with = [
        'funcao_rel'
    ];

    /**
     * @return BelongsTo
     */
    public function funcao_rel()
    {
        return $this->belongsTo(Funcao::class, 'funcao', 'abreviacao');
    }

    /**
     * @return BelongsTo
     */
    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'voluntario_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
