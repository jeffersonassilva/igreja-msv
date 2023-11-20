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
        'cartao_id',
        'membro_id',
        'verificada',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cartao()
    {
        return $this->belongsTo(Cartao::class, 'cartao_id', 'id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membro()
    {
        return $this->belongsTo(Membro::class, 'membro_id', 'id');
    }

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
