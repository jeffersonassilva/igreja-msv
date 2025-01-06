<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\AlunoRequest;
use App\Services\EBD\AlunoService;
use App\Services\EBD\ClasseService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AlunoController extends Controller
{
    /**
     * @var AlunoService
     */
    private $service;

    /**
     * @var ClasseService
     */
    private $classeService;

    /**
     * @param AlunoService $service
     * @param ClasseService $classeService
     */
    public function __construct(AlunoService $service, ClasseService $classeService)
    {
        $this->service = $service;
        $this->classeService = $classeService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-ebd-alunos');
        $data = $this->service->paginate(['nome' => Constants::CRESCENTE], null, ['classes']);
        return view('admin/ebd/alunos/index')->with('alunos', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-ebd-aluno');
        $classes = $this->classeService->all();
        $arrayClasses = [];

        foreach ($classes as $key => $classe) {
            $arrayClasses[$key]['id'] = $classe->id;
            $arrayClasses[$key]['descricao'] = $classe->nome;
            $arrayClasses[$key]['checked'] = false;
        }

        return view('admin/ebd/alunos/create')->with(['classes' => $arrayClasses]);
    }

    /**
     * @param AlunoRequest $request
     * @return RedirectResponse
     */
    public function store(AlunoRequest $request)
    {
        $this->checkPermission('adm-adicionar-ebd-aluno');
        $this->service->store($request);
        return $this->redirectWithMessage('alunos', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-ebd-aluno');
        $data = $this->service->edit($id);
        $classes = $this->classeService->all();
        $arrayClasses = [];
        $arrayClassesCadastradas = [];

        foreach ($data->classes as $classeCadastrada) {
            $arrayClassesCadastradas[] = $classeCadastrada->id;
        }

        foreach ($classes as $key => $classe) {
            $arrayClasses[$key]['id'] = $classe->id;
            $arrayClasses[$key]['descricao'] = $classe->nome;
            $arrayClasses[$key]['checked'] = in_array($classe->id, $arrayClassesCadastradas);
        }

        return view('admin/ebd/alunos/edit')->with([
            'data' => $data,
            'classes' => $arrayClasses
        ]);
    }

    /**
     * @param AlunoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(AlunoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-ebd-aluno');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('alunos', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-ebd-aluno');
        $this->service->destroy($id);
        return $this->redirectWithMessage('alunos', __(Constants::SUCCESS_DESTROY));
    }
}
