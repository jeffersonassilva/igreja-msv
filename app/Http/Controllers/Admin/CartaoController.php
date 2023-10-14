<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartaoRequest;
use App\Services\CartaoService;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-cartao');
        $cartoes = $this->service->all();

        return view('admin/cartoes/index')->with([
            'cartoes' => $cartoes
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-cartao');
        return view('admin/cartoes/create');
    }

    /**
     * @param CartaoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CartaoRequest $request)
    {
        $this->checkPermission('adm-adicionar-cartao');
        $this->service->store($request);
        return $this->redirectWithMessage('cartoes', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CartaoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-cartao');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('cartoes', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-cartao');
        $this->service->destroy($id);
        return $this->redirectWithMessage('cartoes', __(Constants::SUCCESS_DESTROY));
    }
}
