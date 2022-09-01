<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Services\EscalaVoluntarioService;
use App\Services\VoluntarioService;
use Illuminate\Http\Request;

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
     * @var VoluntarioService
     */
    private $voluntarioService;

    /**
     * @param EscalaVoluntarioService $service
     * @param VoluntarioService $voluntarioService
     */
    public function __construct(EscalaVoluntarioService $service, VoluntarioService $voluntarioService)
    {
        $this->service = $service;
        $this->voluntarioService = $voluntarioService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (!$request->get('nome')) {
            return redirect('escalas/#' . $request->get('escala_id'));
        }

        $voluntario = $this->voluntarioService->firstOrCreate($request->get('nome'));
        $request->request->add(['voluntario_id' => $voluntario->id]);
        $this->service->store($request);

        return redirect('escalas/#' . $request->get('escala_id'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $voluntario = $this->service->update($request, $id);
        return redirect()->route('escalas.edit', $voluntario->escala_id)->with(
            Constants::MESSAGE, __(Constants::SUCCESS_UPDATE)
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $voluntario = $this->service->destroy($id);
        return redirect()->route('escalas.edit', $voluntario->escala_id)->with(
            Constants::MESSAGE, __(Constants::SUCCESS_DESTROY)
        );
    }
}
