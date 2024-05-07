<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\EscalaVoluntarioRequest;
use App\Services\EscalaService;
use App\Services\EscalaVoluntarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;

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
     * @return Application|RedirectResponse|Redirector
     */
    public function new(EscalaVoluntarioRequest $request)
    {
        $this->service->store($request);
        $this->escalaService->regraQntdVoluntariosAtingida($request->get('escala_id'));
        return redirect('escalas/#' . $request->get('escala_id'));
    }

    /**
     * @param EscalaVoluntarioRequest $request
     * @return RedirectResponse
     */
    public function store(EscalaVoluntarioRequest $request)
    {
        $this->checkPermission('adm-editar-escala');
        $request->request->add(['user_id' => Auth::id()]);
        $this->service->store($request);
        $this->escalaService->regraQntdVoluntariosAtingida($request->get('escala_id'));
        return $this->redirectWithMessage(
            ['escalas.edit', $request->get('escala_id')],
            __(Constants::SUCCESS_UPDATE)
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->checkPermission('adm-editar-escala');
        $voluntario = $this->service->update($request, $id);
        return $this->redirectWithMessage(['escalas.edit', $voluntario->escala_id], __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $voluntario = $this->service->destroy($id);
        return $this->redirectWithMessage(['escalas.edit', $voluntario->escala_id], __(Constants::SUCCESS_DESTROY));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateApi(Request $request)
    {
        $data = $this->service->update($request, $request->get('id'));
        return response()->json(['data' => $data, 'retorno' => true]);
    }
}
