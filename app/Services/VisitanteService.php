<?php

namespace App\Services;

use App\Models\Visitante;

/**
 * Class VisitanteService
 * @package App\Services
 */
class VisitanteService extends AbstractService
{
    /**
     * @var Visitante
     */
    protected $model;

    /**
     * VisitanteService constructor.
     */
    public function __construct()
    {
        $this->model = new Visitante();
    }

    /**
     * @param $request
     * @return Visitante|mixed
     */
    public function store($request)
    {
        $visitante = $this->model->fill($request->all());
        $visitante->save();
        $visitante->refresh();

        return $visitante;
    }
}
