<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\EscalaVoluntarioRequest;
use App\Services\EscalaService;
use App\Services\EscalaVoluntarioService;
use App\Services\VoluntarioService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function index()
    {
        $data = $this->service->list();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * @param EscalaVoluntarioRequest $request
     * @return JsonResponse
     */
    public function store(EscalaVoluntarioRequest $request)
    {
        $voluntario = $this->voluntarioService->where(['codigo' => $request->get('codigo')])->first();

        if ($voluntario) {
            $escalaVoluntario = $this->escalaVoluntarioService->where([
                'voluntario_id' => $voluntario->id,
                'escala_id' => $request->get('escala_id'),
            ])->whereNull('deleted_at')->first();

            if ($escalaVoluntario) {
                return response()->json(['error' => [
                    'codigo' => [
                        'Este voluntário já está adicionado nesta escala.'
                    ]
                ]], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

        $dados = array_merge($request->all(), ['voluntario_id' => $voluntario->id]);
        $this->escalaVoluntarioService->storeWithArray($dados);
        $this->service->regraQntdVoluntariosAtingida($request->get('escala_id'));

        return response()->json($request->all());
    }
}
