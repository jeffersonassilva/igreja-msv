<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;

class ClasseCalendario extends AbstractModel
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
        'professor',
        'classe_id',
    ];

    protected $with = [
        'classe'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }
}
