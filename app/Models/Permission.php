<?php

namespace App\Models;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
