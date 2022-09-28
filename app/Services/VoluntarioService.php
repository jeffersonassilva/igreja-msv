<?php

namespace App\Services;

use App\Models\Voluntario;

/**
 * Class VoluntarioService
 * @package App\Services
 */
class VoluntarioService extends AbstractService
{
    /**
     * @var Voluntario
     */
    protected $model;

    /**
     * VoluntarioService constructor.
     */
    public function __construct()
    {
        $this->model = new Voluntario();
    }

    /**
     * @param array $where
     * @param array $orders
     * @return mixed
     */
    public function where(array $where = array(), array $orders = array())
    {
        $where = array_filter($where);

        if (isset($where['nome'])) {
            $where['nome'] = ['like', '%' . $where['nome'] . '%'];
        }

        return parent::where($where, $orders);
    }

    /**
     * @param $nome
     * @return mixed
     */
    public function firstOrCreate($nome)
    {
        return Voluntario::firstOrCreate(['nome' => $nome]);
    }
}
