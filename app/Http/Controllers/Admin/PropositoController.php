<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropositoRequest;
use App\Services\PropositoService;

class PropositoController extends Controller
{
    /**
     * @var PropositoService
     */
    private $service;

    /**
     * IndexController constructor.
     * @param PropositoService $service
     */
    public function __construct(PropositoService $service)
    {
        $this->service = $service;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PropositoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-proposito');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('site', __(Constants::SUCCESS_UPDATE));
    }
}
