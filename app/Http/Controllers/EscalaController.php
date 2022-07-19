<?php

namespace App\Http\Controllers;

use App\Services\EscalaFuncaoService;
use App\Services\EscalaService;
use Illuminate\Http\Request;

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
     * @var EscalaFuncaoService
     */
    private $escalaFuncaoService;

    /**
     * @param EscalaService $service
     * @param EscalaFuncaoService $escalaFuncaoService
     */
    public function __construct(EscalaService $service, EscalaFuncaoService $escalaFuncaoService)
    {
        $this->service = $service;
        $this->escalaFuncaoService = $escalaFuncaoService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list()
    {
        $data = $this->service->list();
        $funcoes = $this->escalaFuncaoService->list();

        return view('escalas')->with(['escalas' => $data, 'funcoes' => $funcoes]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->service->store($request);
        return $this->redirectWithMessage('dashboard', __(Constants::SUCCESS_CREATE));
    }
}
