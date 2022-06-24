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
     * @param array $filtros
     * @param null $order
     * @param false $orderDesc
     * @return mixed
     */
    public function paginate($filtros = array(), $order = null, $orderDesc = false)
    {
        $query = $this->model;

        if ($order) {
            $query = $query->orderBy($order, $orderDesc ? 'desc' : 'asc');
        }

        foreach ($filtros as $filtro) {
            if ($filtro['type'] === 'like') {
                $query->where($filtro['field'], "like", "%{$filtro['value']}%");
            }
        }

        return $query->paginate();
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
