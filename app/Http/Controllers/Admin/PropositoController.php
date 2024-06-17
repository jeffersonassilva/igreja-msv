<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropositoRequest;
use App\Services\PropositoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PropositoController extends Controller
{
    /**
     * @var PropositoService
     */
    private $service;

    /**
     * @param PropositoService $service
     */
    public function __construct(PropositoService $service)
    {
        $this->service = $service;
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-proposito');
        $proposito = $this->service->edit($id);
        return view('admin/propositos/edit')->with(['proposito' => $proposito]);
    }

    /**
     * @param PropositoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PropositoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-proposito');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('site', __(Constants::SUCCESS_UPDATE));
    }
}
