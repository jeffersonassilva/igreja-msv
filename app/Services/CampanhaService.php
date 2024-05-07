<?php

namespace App\Services;

use App\Models\Campanha;

class CampanhaService extends AbstractService
{
    /**
     * @var Campanha
     */
    protected $model;

    /**
     * CampanhaService constructor.
     */
    public function __construct()
    {
        $this->model = new Campanha();
    }
}
