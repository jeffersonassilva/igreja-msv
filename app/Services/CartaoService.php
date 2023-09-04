<?php

namespace App\Services;

use App\Models\Cartao;

/**
 * Class CartaoService
 * @package App\Services
 */
class CartaoService extends AbstractService
{
    /**
     * @var Cartao
     */
    protected $model;

    /**
     * CartaoService constructor.
     */
    public function __construct()
    {
        $this->model = new Cartao();
    }

    /**
     * @param $identificador
     * @return mixed
     */
    public function findByIdentificador($identificador)
    {
        return $this->model->where(['identificador' => $identificador])->first();
    }
}
