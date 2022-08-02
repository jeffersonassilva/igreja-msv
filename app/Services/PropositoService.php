<?php

namespace App\Services;

use App\Models\Proposito;
use Illuminate\Support\Facades\Cache;

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
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        Cache::pull('msv::lista-propositos');
        return parent::update($request, $id);
    }
}
