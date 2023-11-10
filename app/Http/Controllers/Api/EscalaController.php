<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EscalaService;

/**
 * Class EscalaController
 * @package App\Http\Controllers
 */
class EscalaController extends Controller
{
    /**
     * @var EscalaService
     */
    private $service;

    /**
     * @param EscalaService $service
     */
    public function __construct(EscalaService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->service->list();
        return response()->json($data);
    }
}
