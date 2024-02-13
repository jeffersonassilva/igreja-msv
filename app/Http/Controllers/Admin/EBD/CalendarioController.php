<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\CalendarioRequest;
use App\Services\EBD\CalendarioService;
use App\Services\EBD\ClasseService;
use App\Services\EBD\ProfessorService;

/**
 * Class CalendarioController
 * @package App\Http\Controllers
 */
class CalendarioController extends Controller
{
    /**
     * @var CalendarioService
     */
    private $service;

    /**
     * @var ClasseService
     */
    private $classeService;

    /**
     * @var ProfessorService
     */
    private $professorService;

    /**
     * @param CalendarioService $service
     * @param ClasseService $classeService
     * @param ProfessorService $professorService
     */
    public function __construct(CalendarioService $service, ClasseService $classeService, ProfessorService $professorService)
    {
        $this->service = $service;
        $this->classeService = $classeService;
        $this->professorService = $professorService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-ebd-calendario');
        $data = $this->service->paginate(['data' => 'asc']);
        return view('admin/ebd/calendario/index')->with('datas', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-ebd-calendario');
        $classes = $this->classeService->all();
        $arrayClasses = [];

        foreach ($classes as $key => $classe) {
            $arrayClasses[$key]['id'] = $classe->id;
            $arrayClasses[$key]['descricao'] = $classe->nome;
            $arrayClasses[$key]['checked'] = false;
        }

        return view('admin/ebd/calendario/create')->with(['classes' => $arrayClasses]);
    }

    /**
     * @param CalendarioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CalendarioRequest $request)
    {
        $this->checkPermission('adm-adicionar-ebd-calendario');
        $this->service->storeMany($request);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $data = $this->service->edit($id);
        $classes = $this->classeService->pluck('id', 'nome');
        $professores = $this->professorService->pluck('id', 'nome');

        return view('admin/ebd/calendario/edit')->with([
            'data' => $data,
            'classes' => $classes,
            'professores' => $professores
        ]);
    }

    /**
     * @param CalendarioRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CalendarioRequest $request, $id)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-ebd-calendario');
        $this->service->destroy($id);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_DESTROY));
    }
}
