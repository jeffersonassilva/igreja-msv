<?php

namespace App\Services;

use App\Models\Testemunho;

/**
 * Class TestemunhoService
 * @package App\Services
 */
class TestemunhoService extends AbstractService
{
    /**
     * @var Testemunho
     */
    protected $model;

    /**
     * TestemunhoService constructor.
     */
    public function __construct()
    {
        $this->model = new Testemunho();
    }
}
