<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id', 'id');
    }
}
