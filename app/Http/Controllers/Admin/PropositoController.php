<?php

namespace App\Http\Controllers\Admin;

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
        $dados = $request->all();
        $data = $this->service->edit($id);
        $data->fill($dados)->save();

        return redirect()->route('dashboard');
    }
}