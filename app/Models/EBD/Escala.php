<?php

namespace App\Models\EBD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Escala extends Model
{
    /**
     * @var string
     */
    protected $table = 'ebd_escalas';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'tema',
        'local',
        'link',
        'permanente',
        'titulo',
        'monitor',
        'professor_id',
        'classe_id',
        'calendario_id',
    ];

    /**
     * @return BelongsTo
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    /**
     * @return BelongsTo
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
