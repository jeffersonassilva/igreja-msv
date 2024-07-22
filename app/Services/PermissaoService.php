<?php

namespace App\Services;

use App\Models\Permission;

class PermissaoService extends AbstractService
{
    /**
     * @var Permission
     */
    protected $model;

    /**
     * PermissaoService constructor.
     */
    public function __construct()
    {
        $this->model = new Permission();
    }
}
