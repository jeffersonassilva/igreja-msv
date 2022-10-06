<?php

namespace App\Services;

use App\Models\Role;

/**
 * Class PerfilService
 * @package App\Services
 */
class PerfilService extends AbstractService
{
    /**
     * @var Role
     */
    protected $model;

    /**
     * PerfilService constructor.
     */
    public function __construct()
    {
        $this->model = new Role();
    }

    /**
     * @param $request
     * @return array|mixed
     */
    public function store($request)
    {
        $this->model->fill($request->all())->save();
        return $this->model->permissions()->sync($request->permissions);
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
        $data->permissions()->sync($request->permissions);

        return $data;
    }
}
