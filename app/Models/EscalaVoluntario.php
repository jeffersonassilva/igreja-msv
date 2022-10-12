<?php

namespace App\Models;

class EscalaVoluntario extends AbstractModel
{
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
