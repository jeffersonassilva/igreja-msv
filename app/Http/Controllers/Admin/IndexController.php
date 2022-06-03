<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropositoRequest;
use App\Services\PropositoService;
use Illuminate\Http\Request;

class IndexController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('admin/index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function propositos()
    {
        $propositos = $this->service->paginate();

        return view('admin/propositos/index')->with(['propositos' => $propositos]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function propositosEdit($id)
    {
        $proposito = $this->service->edit($id);

        return view('admin/propositos/edit')->with(['proposito' => $proposito]);
    }

    /**
     * @param PropositoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function propositosUpdate(PropositoRequest $request, $id)
    {
        $dados = $request->all();
        $data = $this->service->edit($id);
        $data->fill($dados)->save();

        return redirect()->route('propositos');
    }
}
