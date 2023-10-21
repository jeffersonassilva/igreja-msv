<?php

namespace App\Models;

class Membro extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'membros';

    /**
     * @var string
     */
    protected $perPage = '9';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nome',
        'foto',
        'sexo',
        'estado_civil',
        'dt_nascimento',
        'dt_casamento',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'pais',
        'telefone',
        'email',
        'matricula',
    ];

    /**
     * @return string
     */
    public function getNomeFormatadoAttribute()
    {
        $nomes = explode(' ', $this->nome);
        $primeiroNome = current($nomes);
        $ultimoNome = end($nomes);

        return $primeiroNome . ' ' . $ultimoNome;
    }
}
