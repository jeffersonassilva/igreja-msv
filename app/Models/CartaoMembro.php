<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartaoMembro extends Model
{
    /**
     * @var string
     */
    protected $table = 'cartao_membro';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'cartao_id',
        'membro_id',
        'codigo',
    ];

    /**
     * @return BelongsTo
     */
    public function membro()
    {
        return $this->belongsTo(Membro::class, 'membro_id', 'id');
    }
}
