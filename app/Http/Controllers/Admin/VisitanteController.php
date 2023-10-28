<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitanteRequest;
use App\Services\VisitanteService;

/**
 * Class VisitanteController
 * @package App\Http\Controllers
 */
class VisitanteController extends Controller
{
    /**
     * @var VisitanteService
     */
    private $service;

    /**
     * @param VisitanteService $service
     */
    public function __construct(VisitanteService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('visitantes');
    }

    /**
     * @param VisitanteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VisitanteRequest $request)
    {
        $this->service->store($request);
        return $this->redirectWithMessage('visitantes.create', __(Constants::SUCCESS_CREATE));
    }
}
