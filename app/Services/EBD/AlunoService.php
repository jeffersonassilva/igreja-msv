<?php

namespace App\Services\EBD;

use App\Models\EBD\Aluno;
use App\Services\AbstractService;

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
