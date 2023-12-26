<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Services\EscalaService;
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
     * @var VoluntarioService
     */
    private $voluntarioService;

    /**
     * @param EscalaService $service
     * @param VoluntarioService $voluntarioService
     */
    public function __construct(EscalaService $service, VoluntarioService $voluntarioService)
    {
        $this->service = $service;
        $this->voluntarioService = $voluntarioService;
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
}
