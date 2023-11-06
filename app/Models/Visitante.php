<?php

namespace App\Models;

class Visitante extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'visitantes';

    /**
     * @var string
     */
    protected $perPage = '15';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'dt_visita',
        'nome',
        'sexo',
        'dt_nascimento',
        'endereco',
        'telefone',
        'whatsapp',
        'batizado',
        'responsavel',
        'sem_sucesso',
        'dt_primeiro_contato',
        'dt_segunda_visita',
        'congregando',
        'deseja_batismo',
        'membro_ativo',
        'observacao',
    ];
}