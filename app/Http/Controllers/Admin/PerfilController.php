<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerfilRequest;
use App\Services\PerfilService;
use App\Services\PermissaoService;

class PerfilController extends Controller
{
    /**
     * @var PerfilService
     */
    private $service;

    /**
     * @var PermissaoService
     */
    private $permissaoService;

    /**
     * @param PerfilService $service
     * @param PermissaoService $permissaoService
     */
    public function __construct(PerfilService $service, PermissaoService $permissaoService)
    {
        $this->service = $service;
        $this->permissaoService = $permissaoService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-perfil');
        $perfis = $this->service->all();

        return view('admin/perfis/index')->with([
            'perfis' => $perfis
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-perfil');
        $permissoes = $this->permissaoService->all();

        return view('admin/perfis/create')->with([
            'permissoes' => $permissoes
        ]);
    }

    /**
     * @param PerfilRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PerfilRequest $request)
    {
        $this->checkPermission('adm-adicionar-perfil');
        $this->service->store($request);
        return $this->redirectWithMessage('perfis', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-perfil');
        $data = $this->service->edit($id);
        $permissoes = $this->permissaoService->all();
        $arrayPermissoes = [];
        $arrayPermissoesCadastradas = [];

        foreach ($data->permissions as $permissaoCadastrada) {
            $arrayPermissoesCadastradas[] = $permissaoCadastrada->id;
        }

        foreach ($permissoes as $key => $permissao) {
            $arrayPermissoes[$key]['id'] = $permissao->id;
            $arrayPermissoes[$key]['nome'] = $permissao->nome;
            $arrayPermissoes[$key]['descricao'] = $permissao->descricao;
            $arrayPermissoes[$key]['checked'] = in_array($permissao->id, $arrayPermissoesCadastradas);
        }

        return view('admin/perfis/edit')->with([
            'data' => $data,
            'permissoes' => $arrayPermissoes
        ]);
    }

    /**
     * @param PerfilRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PerfilRequest $request, $id)
    {
        $this->checkPermission('adm-editar-perfil');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('perfis', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-perfil');
        $this->service->forceDestroy($id);
        return $this->redirectWithMessage('perfis', __(Constants::SUCCESS_DESTROY));
    }
}
