<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\TestemunhoRequest;
use App\Services\TestemunhoService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TestemunhoController extends Controller
{
    /**
     * @var TestemunhoService
     */
    private $service;

    /**
     * @param TestemunhoService $service
     */
    public function __construct(TestemunhoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function list()
    {
        $data = $this->service->where(
            ['situacao' => Constants::TRUE],
            ['created_at' => Constants::DECRESCENTE]
        )->paginate();
        return view('testemunhos')->with('testemunhos', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-testemunho');
        $data = $this->service->where(array(), ['created_at' => Constants::DECRESCENTE])->paginate();
        return view('admin/testemunhos/index')->with('testemunhos', $data);
    }

    /**
     * @param TestemunhoRequest $request
     * @return RedirectResponse
     */
    public function store(TestemunhoRequest $request)
    {
        $this->service->store($request);
        return $this->redirectWithMessage(
            'testemunhos.list',
            'Obrigado por compartilhar seu testemunho conosco. Que o Senhor continue te bençoando!');
    }

    /**
     * @param $id
     * @return Application|Factory|View
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
     * @return RedirectResponse
     */
    public function update(TestemunhoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-testemunho');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('testemunhos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function enable($id)
    {
        $this->checkPermission('adm-ativar-testemunho');
        $this->service->enable($id);
        return $this->redirectWithMessage('testemunhos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function disable($id)
    {
        $this->checkPermission('adm-desativar-testemunho');
        $this->service->disable($id);
        return $this->redirectWithMessage('testemunhos', __(Constants::SUCCESS_UPDATE));
    }
}
