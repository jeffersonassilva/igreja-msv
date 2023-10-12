<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissaoRequest;
use App\Services\PermissaoService;

class PermissaoController extends Controller
{
    /**
     * @var PermissaoService
     */
    private $service;

    /**
     * @param PermissaoService $service
     */
    public function __construct(PermissaoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-permissao');
        $permissoes = $this->service->paginate();

        return view('admin/permissoes/index')->with([
            'permissoes' => $permissoes
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-permissao');
        return view('admin/permissoes/create');
    }

    /**
     * @param PermissaoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissaoRequest $request)
    {
        $this->checkPermission('adm-adicionar-permissao');
        $this->service->store($request);
        return $this->redirectWithMessage('permissoes', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-permissao');
        $data = $this->service->edit($id);

        return view('admin/permissoes/edit')->with([
            'data' => $data,
        ]);
    }

    /**
     * @param PermissaoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissaoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-permissao');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('permissoes', __(Constants::SUCCESS_UPDATE));
    }
}
