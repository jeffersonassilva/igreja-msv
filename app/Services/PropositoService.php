<?php

namespace App\Services;

use App\Models\Proposito;

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
}
