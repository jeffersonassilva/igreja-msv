<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Services\VoluntarioService;
use Illuminate\Http\Request;

/**
 * Class VoluntarioController
 * @package App\Http\Controllers
 */
class VoluntarioController extends Controller
{
    /**
     * @var VoluntarioService
     */
    private $service;

    /**
     * @param VoluntarioService $service
     */
    public function __construct(VoluntarioService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
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
