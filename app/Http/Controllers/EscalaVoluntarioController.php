<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\EscalaVoluntarioRequest;
use App\Models\Escala;
use App\Services\EscalaService;
use App\Services\EscalaVoluntarioService;
use App\Services\VoluntarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class EscalaVoluntarioController
 * @package App\Http\Controllers
 */
class EscalaVoluntarioController extends Controller
{
    /**
     * @var EscalaVoluntarioService
     */
    private $service;

    /**
     * @var EscalaService
     */
    private $escalaService;

    /**
     * @param EscalaVoluntarioService $service
     * @param EscalaService $escalaService
     */
    public function __construct(EscalaVoluntarioService $service, EscalaService $escalaService)
    {
        $this->service = $service;
        $this->escalaService = $escalaService;
    }

    /**
     * @param EscalaVoluntarioRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function new(EscalaVoluntarioRequest $request)
    {
        $this->service->store($request);
        $this->regraQntdVoluntariosAtingida($request);
        return redirect('escalas/#' . $request->get('escala_id'));
    }

    /**
     * @param EscalaVoluntarioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EscalaVoluntarioRequest $request)
    {
        $this->checkPermission('adm-editar-escala');
        $request->request->add(['user_id' => Auth::id()]);
        $this->service->store($request);
        $this->regraQntdVoluntariosAtingida($request);

        return redirect()
            ->route('escalas.edit', $request->get('escala_id'))
            ->with(Constants::MESSAGE, __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->checkPermission('adm-editar-escala');
        $voluntario = $this->service->update($request, $id);
        return redirect()
            ->route('escalas.edit', $voluntario->escala_id)
            ->with(Constants::MESSAGE, __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $voluntario = $this->service->destroy($id);
        return redirect()
            ->route('escalas.edit', $voluntario->escala_id)
            ->with(Constants::MESSAGE, __(Constants::SUCCESS_DESTROY)
            );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateApi(Request $request)
    {
        $data = $this->service->update($request, $request->get('id'));
        return response()->json(['data' => $data, 'retorno' => true]);
    }

    /**
     * @param $request
     * @return void
     */
    private function regraQntdVoluntariosAtingida($request)
    {
        $escalaId = $request->get('escala_id');
        $escala = $this->escalaService->find($escalaId);
        $qntdVoluntariosAtual = $escala->voluntarios()->count();
        $qntdVoluntariosPossiveis = $escala->evento->qntd_voluntarios;

        if (
            !empty($qntdVoluntariosAtual) &&
            !empty($qntdVoluntariosPossiveis) &&
            ($qntdVoluntariosAtual >= $qntdVoluntariosPossiveis)
        ) {
            $escala->fechada = Constants::TRUE;
            $escala->save();
        }
    }
}
