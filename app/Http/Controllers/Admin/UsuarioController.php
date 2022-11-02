<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    /**
     * @var UsuarioService
     */
    private $service;

    /**
     * @param UsuarioService $service
     */
    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-usuario');
        $usuarios = $this->service->all();

        return view('admin/usuarios/index')->with([
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-usuario');
        return view('admin/usuarios/create');
    }

    /**
     * @param UsuarioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsuarioRequest $request)
    {
        $this->checkPermission('adm-adicionar-usuario');
        $this->service->store($request);
        return $this->redirectWithMessage('usuarios', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-usuario');
        $data = $this->service->edit($id);
        return view('admin/usuarios/edit')->with(['data' => $data]);
    }

    /**
     * @param UsuarioRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsuarioRequest $request, $id)
    {
        $this->checkPermission('adm-editar-usuario');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('usuarios', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-usuario');
        $this->service->destroy($id);
        return $this->redirectWithMessage('usuarios', __(Constants::SUCCESS_DESTROY));
    }
}
