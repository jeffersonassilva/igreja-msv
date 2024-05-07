<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\CalendarioFixoRequest;
use App\Http\Requests\EBD\CalendarioRequest;
use App\Services\EBD\CalendarioService;
use App\Services\EBD\ClasseService;
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
     * @var ProfessorService
     */
    private $professorService;

    /**
     * @param CalendarioService $service
     * @param ClasseService $classeService
     * @param ProfessorService $professorService
     */
    public function __construct(
        CalendarioService $service,
        ClasseService     $classeService,
        ProfessorService  $professorService
    )
    {
        $this->service = $service;
        $this->classeService = $classeService;
        $this->professorService = $professorService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        $aulasDinamicas = $this->service->aulasDinamicas($request->all());
        $aulasPermanentes = $this->service->aulasPermanentes($request->all());

        return view('escalas-ebd')->with([
            'aulasDinamicas' => $aulasDinamicas,
            'aulasPermanentes' => $aulasPermanentes,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-ebd-calendario');
        $data = $this->service->paginate(['data' => 'desc']);
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
        $this->service->storeMany($request);
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

    /**
     * @return Application|Factory|View
     */
    public function indexFixo()
    {
        $this->checkPermission('adm-listar-ebd-calendario');
        $data = $this->service->where(['permanente' => '1'], ['data' => 'desc'])->paginate();
        return view('admin/ebd/calendario-fixo/index')->with('datas', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function createFixo()
    {
        $this->checkPermission('adm-adicionar-ebd-calendario');
        $classes = $this->classeService->pluck('id', 'nome');
        $professores = $this->professorService->pluck('id', 'nome');

        return view('admin/ebd/calendario-fixo/create')->with([
            'classes' => $classes,
            'professores' => $professores
        ]);
    }

    /**
     * @param CalendarioFixoRequest $request
     * @return RedirectResponse
     */
    public function storeFixo(CalendarioFixoRequest $request)
    {
        $this->checkPermission('adm-adicionar-ebd-calendario');
        $request->request->add(['permanente' => '1']);
        $this->service->store($request);
        return $this->redirectWithMessage('calendario-fixo', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editFixo($id)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $data = $this->service->edit($id);
        $classes = $this->classeService->pluck('id', 'nome');
        $professores = $this->professorService->pluck('id', 'nome');

        return view('admin/ebd/calendario-fixo/edit')->with([
            'data' => $data,
            'classes' => $classes,
            'professores' => $professores
        ]);
    }

    /**
     * @param CalendarioFixoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateFixo(CalendarioFixoRequest $request, $id)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('calendario-fixo', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroyFixo($id)
    {
        $this->checkPermission('adm-excluir-ebd-calendario');
        $this->service->destroy($id);
        return $this->redirectWithMessage('calendario-fixo', __(Constants::SUCCESS_DESTROY));
    }
}
