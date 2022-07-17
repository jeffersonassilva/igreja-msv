<?php

namespace App\Services;

use App\Models\Voluntario;

/**
 * Class VoluntarioService
 * @package App\Services
 */
class VoluntarioService extends AbstractService
{
    /**
     * @var Voluntario
     */
    protected $model;

    /**
     * VoluntarioService constructor.
     */
    public function __construct()
    {
        $this->model = new Voluntario();
    }
}
