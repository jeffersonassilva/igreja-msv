<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\FuncaoRequest;
use App\Services\FuncaoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EscalaFuncaoController extends Controller
{
    /**
     * @var FuncaoService
     */
    private $service;

    /**
     * @param FuncaoService $service
     */
    public function __construct(FuncaoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-escala-funcao');
        $data = $this->service->all(['descricao' => 'asc']);
        return view('admin/funcoes/index')->with('funcoes', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-escala-funcao');
        return view('admin/funcoes/create');
    }

    /**
     * @param FuncaoRequest $request
     * @return RedirectResponse
     */
    public function store(FuncaoRequest $request)
    {
        $this->checkPermission('adm-adicionar-escala-funcao');
        $this->service->store($request);
        return $this->redirectWithMessage('funcoes', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-escala-funcao');
        $data = $this->service->edit($id);
        return view('admin/funcoes/edit')->with(['data' => $data]);
    }

    /**
     * @param FuncaoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(FuncaoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-escala-funcao');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('funcoes', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-escala-funcao');
        $this->service->destroy($id);
        return $this->redirectWithMessage('funcoes', __(Constants::SUCCESS_DESTROY));
    }
}
