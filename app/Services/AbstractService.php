<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

abstract class AbstractService
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $orders
     * @param $cacheKey
     * @param $cacheTime
     * @return mixed
     */
    public function all(array $orders = array(), $cacheKey = null, $cacheTime = null)
    {
        if ($cacheKey && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $query = $this->model;

        foreach ($orders as $key => $value) {
            if (isset($value) && !empty($value)) {
                $query = $query->orderBy($key, $value);
            }
        }

        $result = $query->get();

        if ($cacheKey) {
            Cache::put($cacheKey, $result, $cacheTime);
        }

        return $result;
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
            if (is_array($value)) {
                $query = $query->where($key, $value[0], $value[1]);
            } else {
                $query = $query->where($key, $value);
            }
        }

        foreach ($orders as $key => $value) {
            if ($value === 'IS NULL') {
                $query = $query->orderByRaw("{$key} {$value}");
            } else {
                $query = $query->orderBy($key, $value);
            }
        }

        return $query;
    }

    /**
     * @param array $orders
     * @param $perPage
     * @param $relations
     * @return mixed
     */
    public function paginate(array $orders = array(), $perPage = null, $relations = array())
    {
        $query = $this->model;

        if ($relations) {
            foreach ($relations as $relation) {
                $query = $query->with($relation);
            }
        }

        foreach ($orders as $key => $value) {
            if (isset($value) && !empty($value)) {
                $query = $query->orderBy($key, $value);
            }
        }

        return $perPage ? $query->paginate($perPage) : $query->paginate();
    }

    /**
     * @param $id
     * @param $description
     * @return array
     */
    public function pluck($id, $description)
    {
        $dados = $this->model->orderBy($description)->pluck($id, $description);
        $lista = array();

        foreach ($dados as $key => $dado) {
            $lista[] = [
                'id' => $dado,
                'descricao' => $key,
            ];
        }

        return $lista;
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
     * @param $dados
     * @return mixed
     */
    public function storeWithArray($dados)
    {
        return $this->model->fill($dados)->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->find($id);
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

    /**
     * @param $id
     * @return mixed
     */
    public function forceDestroy($id)
    {
        $data = $this->model->find($id);
        $data->forceDelete();

        return $data;
    }
}
