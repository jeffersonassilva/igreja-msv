<?php

namespace App\Models;

class NotaFiscal extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'notas_fiscais';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'data',
        'valor',
        'descricao',
        'categoria',
        'observacao',
        'arquivo',
        'verificada',
    ];

    /**
     * @param $value
     * @return void
     */
    public function setValorAttribute($value)
    {
        $value = str_replace(',', '.', str_replace('.', '', $value));
        $this->attributes['valor'] = $value;
    }
}
