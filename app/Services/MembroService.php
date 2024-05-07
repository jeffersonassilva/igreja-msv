<?php

namespace App\Services;

use App\Models\Membro;
use App\Models\Visitante;

class MembroService extends AbstractService
{
    /**
     * @var Membro
     */
    protected $model;

    /**
     * MembroService constructor.
     */
    public function __construct()
    {
        $this->model = new Membro();
    }

    /**
     * @param Visitante $visitante
     * @return Membro
     */
    public function transformarVisitanteEmMembro(Visitante $visitante)
    {
        $dados = $visitante->toArray();
        unset($dados['id']);
        $dados['logradouro'] = $dados['endereco'];

        $membro = $this->model->fill($dados);
        $membro->save();
        $membro->refresh();

        return $membro;
    }
}
