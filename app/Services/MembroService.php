<?php

namespace App\Services;

use App\Models\Membro;

/**
 * Class MembroService
 * @package App\Services
 */
class MembroService extends AbstractService
{
    /**
     * @var Membro
     */
    protected $model;

    /**
     * MembroService constructor.
     */
    public function __construct()
    {
        $this->model = new Membro();
    }
}
