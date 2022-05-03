<?php

namespace App\Services;

use App\Models\Banner;

/**
 * Class BannerService
 * @package App\Services
 */
class BannerService extends AbstractService
{
    /**
     * @var Banner
     */
    protected $model;

    /**
     * BannerService constructor.
     */
    public function __construct()
    {
        $this->model = new Banner();
    }
}
