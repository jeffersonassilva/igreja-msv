<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EscalaVoluntarioRequest;
use App\Services\EscalaService;
use App\Services\EscalaVoluntarioService;
use App\Services\VoluntarioService;

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
     * @var EscalaVoluntarioService
     */
    private $escalaVoluntarioService;

    /**
     * @var VoluntarioService
     */
    private $voluntarioService;

    /**
     * @param EscalaService $service
     * @param VoluntarioService $voluntarioService
     * @param EscalaVoluntarioService $escalaVoluntarioService
     */
    public function __construct(
        EscalaService           $service,
        VoluntarioService       $voluntarioService,
        EscalaVoluntarioService $escalaVoluntarioService
    )
    {
        $this->service = $service;
        $this->voluntarioService = $voluntarioService;
        $this->escalaVoluntarioService = $escalaVoluntarioService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->service->list();
        $qntdVoluntariadoNecessario = $this->service->qntdVoluntariadoNecessarioNoMes();
        $qntdVoluntariadoPreenchido = $this->service->qntdVoluntariadoPreenchidoNoMes();
        $voluntarios = $this->voluntarioService->where(array('situacao' => true), array('nome' => Constants::CRESCENTE))->get();

        return response()->json([
            'escalas' => $data,
            'voluntarios' => $voluntarios,
            'qntdNecessaria' => $qntdVoluntariadoNecessario,
            'qntdPreenchida' => $qntdVoluntariadoPreenchido,
            'qntdReferencia' => ceil($qntdVoluntariadoNecessario / $voluntarios->count()),
        ]);
    }

    /**
     * @param EscalaVoluntarioRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EscalaVoluntarioRequest $request)
    {
        $this->escalaVoluntarioService->store($request);
//        $this->regraQntdVoluntariosAtingida($request);

        return response()->json($request->all());
    }
}
