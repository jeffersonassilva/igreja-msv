<?php

namespace App\Services;

use App\Models\Classe;

/**
 * Class ClasseService
 * @package App\Services
 */
class ClasseService extends AbstractService
{
    /**
     * @var Classe
     */
    protected $model;

    /**
     * ClasseService constructor.
     */
    public function __construct()
    {
        $this->model = new Classe();
    }
}
