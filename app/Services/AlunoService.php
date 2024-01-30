<?php

namespace App\Services;

use App\Models\Aluno;

/**
 * Class AlunoService
 * @package App\Services
 */
class AlunoService extends AbstractService
{
    /**
     * @var Aluno
     */
    protected $model;

    /**
     * AlunoService constructor.
     */
    public function __construct()
    {
        $this->model = new Aluno();
    }
}
