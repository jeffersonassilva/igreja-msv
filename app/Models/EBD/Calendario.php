<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calendario extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'ebd_calendario';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'data',
        'tema',
        'professor_id',
        'monitor',
        'classe_id',
        'titulo',
        'local',
        'link',
        'permanente',
    ];

    protected $with = [
        'classe',
        'professor'
    ];

    /**
     * @return BelongsTo
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id', 'id');
    }
}
