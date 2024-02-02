<?php

namespace App\Services\EBD;

use App\Models\EBD\Professor;
use App\Services\AbstractService;

/**
 * Class ProfessorService
 * @package App\Services
 */
class ProfessorService extends AbstractService
{
    /**
     * @var Professor
     */
    protected $model;

    /**
     * ProfessorService constructor.
     */
    public function __construct()
    {
        $this->model = new Professor();
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
