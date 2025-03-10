<?php

namespace App\Models\EBD;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'responsavel',
        'secretario',
        'recepcionista',
    ];

    /**
     * @return HasMany
     */
    public function escalas()
    {
        return $this->hasMany(Escala::class);
    }

    /**
     * @return HasMany
     */
    public function escalasOrdenadas()
    {
        return $this->hasMany(Escala::class)
            ->withAggregate('classe', 'nome')
            ->orderBy('classe_nome');
    }
}
