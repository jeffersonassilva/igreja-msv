<?php

namespace App\Services;

use App\Models\Aluno;

/**
 * Class AlunoService
 * @package App\Services
 */
class AlunoService extends AbstractService
{
    /**
     * @var Aluno
     */
    protected $model;

    /**
     * AlunoService constructor.
     */
    public function __construct()
    {
        $this->model = new Aluno();
    }

    /**
     * @param $request
     * @return array|mixed
     */
    public function store($request)
    {
        $this->model->fill($request->all())->save();
        return $this->model->classes()->sync($request->classes);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $data = $this->model->find($id);
        $data->fill($request->all())->save();
        $data->classes()->sync($request->classes);

        return $data;
    }
}
