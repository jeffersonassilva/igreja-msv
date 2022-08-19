<?php

namespace App\Http\Controllers;

use App\Services\VoluntarioService;

/**
 * Class VoluntarioController
 * @package App\Http\Controllers
 */
class VoluntarioController extends Controller
{
    /**
     * @var VoluntarioService
     */
    private $service;

    /**
     * @param VoluntarioService $service
     */
    public function __construct(VoluntarioService $service)
    {
        $this->service = $service;
    }
}
