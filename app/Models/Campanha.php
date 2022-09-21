<?php

namespace App\Models;

use Illuminate\Support\Facades\Date;

class Campanha extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'campanha';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nome',
        'data',
        'periodo',
    ];

    protected $appends = [
        'data_br',
    ];

    /**
     * @return string
     */
    public function getDataBrAttribute()
    {
        return Date::parse($this->data)->format('d/m/Y');
    }
}
