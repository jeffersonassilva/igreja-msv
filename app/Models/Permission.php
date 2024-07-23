<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'permissions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nome',
        'descricao',
    ];

    /**
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
