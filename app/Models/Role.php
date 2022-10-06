<?php

namespace App\Models;

class Role extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'descricao',
    ];

    protected $appends = [
        'permissions'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
