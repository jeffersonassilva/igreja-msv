<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\ProfessorRequest;
use App\Services\EBD\ProfessorService;
use App\Services\EBD\ClasseService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfessorController extends Controller
{
    /**
     * @var ProfessorService
     */
    private $service;

    /**
     * @var ClasseService
     */
    private $classeService;

    /**
     * @param ProfessorService $service
     * @param ClasseService $classeService
     */
    public function __construct(ProfessorService $service, ClasseService $classeService)
    {
        $this->service = $service;
        $this->classeService = $classeService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-ebd-professores');
        $data = $this->service->paginate(['nome' => 'asc']);
        return view('admin/ebd/professores/index')->with('professores', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-ebd-professor');
        $classes = $this->classeService->all();
        $arrayClasses = [];

        foreach ($classes as $key => $classe) {
            $arrayClasses[$key]['id'] = $classe->id;
            $arrayClasses[$key]['descricao'] = $classe->nome;
            $arrayClasses[$key]['checked'] = false;
        }

        return view('admin/ebd/professores/create')->with(['classes' => $arrayClasses]);
    }

    /**
     * @param ProfessorRequest $request
     * @return RedirectResponse
     */
    public function store(ProfessorRequest $request)
    {
        $this->checkPermission('adm-adicionar-ebd-professor');
        $this->service->store($request);
        return $this->redirectWithMessage('professores', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-ebd-professor');
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

        return view('admin/ebd/professores/edit')->with([
            'data' => $data,
            'classes' => $arrayClasses
        ]);
    }

    /**
     * @param ProfessorRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ProfessorRequest $request, $id)
    {
        $this->checkPermission('adm-editar-ebd-professor');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('professores', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-ebd-professor');
        $this->service->destroy($id);
        return $this->redirectWithMessage('professores', __(Constants::SUCCESS_DESTROY));
    }
}
