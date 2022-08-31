<?php

namespace App\Services;

use App\Models\EscalaVoluntario;

/**
 * Class EscalaVoluntarioService
 * @package App\Services
 */
class EscalaVoluntarioService extends AbstractService
{
    /**
     * @var EscalaVoluntario
     */
    protected $model;

    /**
     * EscalaVoluntarioService constructor.
     */
    public function __construct()
    {
        $this->model = new EscalaVoluntario();
    }
}
