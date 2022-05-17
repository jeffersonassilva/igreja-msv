<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Models\Testemunho;

/**
 * Class TestemunhoService
 * @package App\Services
 */
class TestemunhoService extends AbstractService
{
    /**
     * @var Testemunho
     */
    protected $model;

    /**
     * TestemunhoService constructor.
     */
    public function __construct()
    {
        $this->model = new Testemunho();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function enable($id)
    {
        $data = $this->model->find($id);
        $data->fill(['situacao' => Constants::TRUE])->save();

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function disable($id)
    {
        $data = $this->model->find($id);
        $data->fill(['situacao' => Constants::FALSE])->save();

        return $data;
    }
}
