<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Services\PerfilService;
use App\Services\UsuarioService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UsuarioController extends Controller
{
    /**
     * @var UsuarioService
     */
    private $service;

    /**
     * @var PerfilService
     */
    private $perfilService;

    /**
     * @param UsuarioService $service
     * @param PerfilService $perfilService
     */
    public function __construct(UsuarioService $service, PerfilService $perfilService)
    {
        $this->service = $service;
        $this->perfilService = $perfilService;
    }

    /**
     * @return Application|Factory|View
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
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-usuario');
        return view('admin/usuarios/create');
    }

    /**
     * @param UsuarioRequest $request
     * @return RedirectResponse
     */
    public function store(UsuarioRequest $request)
    {
        $this->checkPermission('adm-adicionar-usuario');
        $this->service->store($request);
        return $this->redirectWithMessage('usuarios', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-usuario');
        $data = $this->service->edit($id);
        $perfis = $this->perfilService->all();
        $arrayPerfis = [];
        $arrayPerfisCadastrados = [];

        foreach ($data->roles as $perfilCadastrado) {
            $arrayPerfisCadastrados[] = $perfilCadastrado->id;
        }

        foreach ($perfis as $key => $perfil) {
            $arrayPerfis[$key]['id'] = $perfil->id;
            $arrayPerfis[$key]['descricao'] = $perfil->descricao;
            $arrayPerfis[$key]['checked'] = in_array($perfil->id, $arrayPerfisCadastrados);
        }

        return view('admin/usuarios/edit')->with([
            'data' => $data,
            'perfis' => $arrayPerfis
        ]);
    }

    /**
     * @param UsuarioRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UsuarioRequest $request, $id)
    {
        $this->checkPermission('adm-editar-usuario');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('usuarios', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-usuario');
        $this->service->destroy($id);
        return $this->redirectWithMessage('usuarios', __(Constants::SUCCESS_DESTROY));
    }
}
