<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\CampanhaRequest;
use App\Services\CampanhaService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CampanhaController extends Controller
{
    /**
     * @var CampanhaService
     */
    private $service;

    /**
     * @param CampanhaService $service
     */
    public function __construct(CampanhaService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $participantes = $this->service->where(array(), array('data' => 'desc', 'nome' => 'asc'))->get();
        return view('campanha-de-daniel')->with('participantes', $participantes);
    }

    /**
     * @param CampanhaRequest $request
     * @return RedirectResponse
     */
    public function store(CampanhaRequest $request)
    {
        $this->service->store($request);
        return $this->redirectWithMessage('campanha.index', __(Constants::SUCCESS_CREATE));
    }
}
