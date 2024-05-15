<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartaoRequest;
use App\Services\CartaoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartaoController extends Controller
{
    /**
     * @var CartaoService
     */
    private $service;

    /**
     * @param CartaoService $service
     */
    public function __construct(CartaoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-cartao');
        $cartoes = $this->service->all(['identificador' => 'asc']);

        return view('admin/cartoes/index')->with([
            'cartoes' => $cartoes
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-cartao');
        return view('admin/cartoes/create');
    }

    /**
     * @param CartaoRequest $request
     * @return RedirectResponse
     */
    public function store(CartaoRequest $request)
    {
        $this->checkPermission('adm-adicionar-cartao');
        $this->service->store($request);
        return $this->redirectWithMessage('cartoes', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-cartao');
        $data = $this->service->edit($id);

        return view('admin/cartoes/edit')->with([
            'data' => $data,
        ]);
    }

    /**
     * @param CartaoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CartaoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-cartao');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('cartoes', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-cartao');
        $this->service->destroy($id);
        return $this->redirectWithMessage('cartoes', __(Constants::SUCCESS_DESTROY));
    }
}
