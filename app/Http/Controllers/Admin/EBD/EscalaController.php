<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\CalendarioFixoRequest;
use App\Http\Requests\EBD\EscalaRequest;
use App\Services\EBD\ClasseService;
use App\Services\EBD\EscalaService;
use App\Services\EBD\ProfessorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EscalaController extends Controller
{
    /**
     * @var EscalaService
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
     * @param EscalaService $service
     * @param ClasseService $classeService
     * @param ProfessorService $professorService
     */
    public function __construct(
        EscalaService    $service,
        ClasseService    $classeService,
        ProfessorService $professorService
    )
    {
        $this->service = $service;
        $this->classeService = $classeService;
        $this->professorService = $professorService;
    }

    /**
     * @param $idCalendario
     * @param $idEscala
     * @return Application|Factory|View
     */
    public function edit($idCalendario, $idEscala)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $data = $this->service->edit($idEscala);
        $classes = $this->classeService->pluck('id', 'nome');
        $professores = $this->professorService->pluck('id', 'nome');

        return view('admin/ebd/escala/edit')->with([
            'data' => $data,
            'classes' => $classes,
            'professores' => $professores
        ]);
    }

    /**
     * @param EscalaRequest $request
     * @param $id
     * @param $idEscala
     * @return RedirectResponse
     */
    public function update(EscalaRequest $request, $id, $idEscala)
    {
        $this->checkPermission('adm-editar-ebd-calendario');
        $this->service->update($request, $idEscala);
        return $this->redirectWithMessage('calendario', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @return Application|Factory|View
     */
    public function indexFixo()
    {
        $this->checkPermission('adm-listar-ebd-calendario');
        $data = $this->service->aulasPermanentes();
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
