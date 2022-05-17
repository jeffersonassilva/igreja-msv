<?php

namespace App\Services;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService
{
    /**
     * @param array $orders
     * @return mixed
     */
    public function all(array $orders = array())
    {
        $query = $this->model;

        foreach ($orders as $key => $value) {
            if (isset($value) && !empty($value)) {
                $query = $query->orderBy($key, $value);
            }
        }

        return $query->get();
    }

    /**
     * @param array $where
     * @param array $orders
     * @return mixed
     */
    public function where(array $where = array(), array $orders = array())
    {
        $query = $this->model;

        foreach ($where as $key => $value) {
            $query = $query->where($key, $value);
        }

        foreach ($orders as $key => $value) {
            $query = $query->orderBy($key, $value);
        }

        return $query;
    }

    /**
     * @return mixed
     */
    public function paginate()
    {
        return $this->model->paginate();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->model->fill($request->all())->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->model->find($id);
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

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $data = $this->model->find($id);
        $data->delete();

        return $data;
    }
}
