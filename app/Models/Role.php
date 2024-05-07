<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    /**
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
