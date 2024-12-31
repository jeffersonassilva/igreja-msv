<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\CalendarioRequest;
use App\Services\EBD\CalendarioService;
use App\Services\EBD\ClasseService;
use App\Services\EBD\EscalaService;
use App\Services\EBD\ProfessorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @var EscalaService
     */
    private $escalaService;

    /**
     * @var ProfessorService
     */
    private $professorService;

    /**
     * @param CalendarioService $service
     * @param ClasseService $classeService
     * @param EscalaService $escalaService
     * @param ProfessorService $professorService
     */
    public function __construct(
        CalendarioService $service,
        ClasseService     $classeService,
        EscalaService     $escalaService,
        ProfessorService  $professorService
    )
    {
        $this->service = $service;
        $this->classeService = $classeService;
        $this->escalaService = $escalaService;
        $this->professorService = $professorService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        $aulasDinamicas = $this->service->aulasDinamicas();
        $aulasPermanentes = $this->escalaService->aulasPermanentes();

        return view('escalas-ebd')->with([
            'aulasDinamicas' => $aulasDinamicas,
            'aulasPermanentes' => $aulasPermanentes,
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function alunos($id)
    {
        $escala = $this->escalaService->alunos($id);
        return view('escalas-ebd-alunos')->with('escala', $escala);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-ebd-calendario');
        $data = $this->service->aulasDinamicas();
        return view('admin/ebd/calendario/index')->with('datas', $data);
    }

    /**
     * @return Application|Factory|View
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
     * @return RedirectResponse
     */
    public function store(CalendarioRequest $request)
    {
        $this->checkPermission('adm-adicionar-ebd-calendario');
        $request->merge([
            'data' => $request->get('data') . ' 09:00:00',
        ]);
        $this->service->store($request);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $data = $this->service->edit($id);
        $classes = $this->classeService->all();
        $arrayClasses = [];
        $arrayClassesCadastradas = [];

        foreach ($data->escalas as $escala) {
            $arrayClassesCadastradas[] = $escala->classe->id;
        }

        foreach ($classes as $key => $classe) {
            $arrayClasses[$key]['id'] = $classe->id;
            $arrayClasses[$key]['descricao'] = $classe->nome;
            $arrayClasses[$key]['checked'] = in_array($classe->id, $arrayClassesCadastradas);
        }

        return view('admin/ebd/calendario/edit')->with([
            'data' => $data,
            'classes' => $arrayClasses
        ]);
    }

    /**
     * @param CalendarioRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CalendarioRequest $request, $id)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-ebd-calendario');
        $this->service->destroy($id);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_DESTROY));
    }
}
