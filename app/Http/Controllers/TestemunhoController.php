<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\TestemunhoRequest;
use App\Services\TestemunhoService;

/**
 * Class TestemunhoController
 * @package App\Http\Controllers
 */
class TestemunhoController extends Controller
{
    /**
     * @var TestemunhoService
     */
    private $service;

    /**
     * BannerController constructor.
     * @param TestemunhoService $service
     */
    public function __construct(TestemunhoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list()
    {
        $data = $this->service->where(['situacao' => Constants::TRUE], ['created_at' => Constants::DECRESCENTE])->paginate();
        return view('testemunhos')->with('testemunhos', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-testemunho');
        $data = $this->service->where(array(), ['created_at' => Constants::DECRESCENTE])->paginate();
        return view('admin/testemunhos/index')->with('testemunhos', $data);
    }

    /**
     * @param TestemunhoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TestemunhoRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('testemunhos.list')->with('nome', $request->get('nome'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-testemunho');
        $data = $this->service->edit($id);
        return view('admin/testemunhos/edit')->with(['data' => $data]);
    }

    /**
     * @param TestemunhoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TestemunhoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-testemunho');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('testemunhos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable($id)
    {
        $this->checkPermission('adm-ativar-testemunho');
        $this->service->enable($id);
        return $this->redirectWithMessage('testemunhos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disable($id)
    {
        $this->checkPermission('adm-desativar-testemunho');
        $this->service->disable($id);
        return $this->redirectWithMessage('testemunhos', __(Constants::SUCCESS_UPDATE));
    }
}
