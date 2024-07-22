<?php

namespace App\Services;

use App\Models\Pastor;

class PastorService extends AbstractService
{
    /**
     * @var Pastor
     */
    protected $model;

    /**
     * PastorService constructor.
     */
    public function __construct()
    {
        $this->model = new Pastor();
    }
}
