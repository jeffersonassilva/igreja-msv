<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Services\EventoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EventoController extends Controller
{
    /**
     * @var EventoService
     */
    private $service;

    /**
     * @param EventoService $service
     */
    public function __construct(EventoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-evento');
        $data = $this->service->all(['descricao' => 'asc']);
        return view('admin/eventos/index')->with('eventos', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-evento');
        return view('admin/eventos/create');
    }

    /**
     * @param EventoRequest $request
     * @return RedirectResponse
     */
    public function store(EventoRequest $request)
    {
        $this->checkPermission('adm-adicionar-evento');
        $this->service->store($request);
        return $this->redirectWithMessage('eventos', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-evento');
        $data = $this->service->edit($id);
        return view('admin/eventos/edit')->with(['data' => $data]);
    }

    /**
     * @param EventoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(EventoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-evento');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('eventos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-evento');
        $this->service->destroy($id);
        return $this->redirectWithMessage('eventos', __(Constants::SUCCESS_DESTROY));
    }
}
