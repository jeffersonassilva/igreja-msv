<?php

namespace App\Services;

use App\Models\Campanha;

/**
 * Class CampanhaService
 * @package App\Services
 */
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
