<?php

namespace App\Services;

use App\Models\Proposito;

/**
 * Class PropositoService
 * @package App\Services
 */
class PropositoService extends AbstractService
{
    /**
     * @var Proposito
     */
    protected $model;

    /**
     * PropositoService constructor.
     */
    public function __construct()
    {
        $this->model = new Proposito();
    }

    /**
     * @param $request
     * @return Proposito
     */
    public function store($request)
    {
        $dados = $request->all();
        $data = new Proposito();
        $data->fill($dados)->save();

        return $data;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $dados = $request->all();
        $data = $this->model->find($id);
        $data->fill($dados)->save();

        return $data;
    }
}
