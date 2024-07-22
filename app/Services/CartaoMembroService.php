<?php

namespace App\Services;

use App\Models\CartaoMembro;

class CartaoMembroService extends AbstractService
{
    /**
     * @var CartaoMembro
     */
    protected $model;

    /**
     * CartaoMembroService constructor.
     */
    public function __construct()
    {
        $this->model = new CartaoMembro();
    }

    /**
     * @param $cartaoId
     * @param $codigo
     * @return null
     */
    public function findByCartaoIdECodigo($cartaoId, $codigo)
    {
        $membro = $this->model->where([
            'cartao_id' => $cartaoId,
            'codigo' => $codigo,
        ])->with('membro')->first();

        return $membro ? $membro->toArray() : null;
    }
}
