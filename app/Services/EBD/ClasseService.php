<?php

namespace App\Services\EBD;

use App\Models\EBD\Classe;
use App\Services\AbstractService;

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
