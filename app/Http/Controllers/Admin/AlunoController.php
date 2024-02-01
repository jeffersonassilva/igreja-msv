<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use App\Services\AlunoService;

/**
 * Class AlunoController
 * @package App\Http\Controllers
 */
class AlunoController extends Controller
{
    /**
     * @var AlunoService
     */
    private $service;

    /**
     * @param AlunoService $service
     */
    public function __construct(AlunoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-alunos');
        $data = $this->service->paginate(['nome' => 'asc']);
        return view('admin/alunos/index')->with('alunos', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-aluno');

        return view('admin/alunos/create');
    }

    /**
     * @param AlunoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AlunoRequest $request)
    {
        $this->checkPermission('adm-adicionar-aluno');
        $this->service->store($request);
        return $this->redirectWithMessage('alunos', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-aluno');
        $data = $this->service->edit($id);
        return view('admin/alunos/edit')->with(['data' => $data]);
    }

    /**
     * @param AlunoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AlunoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-aluno');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('alunos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-aluno');
        $this->service->destroy($id);
        return $this->redirectWithMessage('alunos', __(Constants::SUCCESS_DESTROY));
    }
}
