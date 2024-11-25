<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EscalaRequest;
use App\Services\EscalaService;
use App\Services\EventoService;
use App\Services\FuncaoService;
use App\Services\VoluntarioService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EscalaController extends Controller
{
    /**
     * @var EscalaService
     */
    private $service;

    /**
     * @var FuncaoService
     */
    private $funcaoService;

    /**
     * @var EventoService
     */
    private $eventoService;

    /**
     * @var VoluntarioService
     */
    private $voluntarioService;

    /**
     * @param EscalaService $service
     * @param FuncaoService $funcaoService
     * @param EventoService $eventoService
     * @param VoluntarioService $voluntarioService
     */
    public function __construct(
        EscalaService       $service,
        FuncaoService       $funcaoService,
        EventoService       $eventoService,
        VoluntarioService   $voluntarioService
    )
    {
        $this->service = $service;
        $this->funcaoService = $funcaoService;
        $this->eventoService = $eventoService;
        $this->voluntarioService = $voluntarioService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request)
    {
        $data = $this->service->list($request->all());
        $funcoes = $this->funcaoService->all();
        $eventos = $this->eventoService->all();
        $voluntarios = $this->voluntarioService->where(
            array('situacao' => true),
            array('nome' => Constants::CRESCENTE)
        )->get();

        return view('escalas')->with([
            'escalas' => $data,
            'funcoes' => $funcoes,
            'voluntarios' => $voluntarios,
            'eventos' => $eventos,
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $this->checkPermission('adm-listar-escala');
        $eventos = $this->eventoService->all();
        $data = $this->service->list($request->all());
        return view('admin/escalas/index')->with(['escalas' => $data, 'eventos' => $eventos]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-escala');
        $eventos = $this->eventoService->where(
            ['situacao' => Constants::TRUE], ['descricao' => Constants::CRESCENTE]
        )->get();
        return view('admin/escalas/create', array('eventos' => $eventos));
    }

    /**
     * @param EscalaRequest $request
     * @return RedirectResponse
     */
    public function store(EscalaRequest $request)
    {
        $this->checkPermission('adm-adicionar-escala');
        $this->setDataEscala($request);
        $this->service->store($request);
        return $this->redirectWithMessage('escalas', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-escala');
        $voluntarios = $this->voluntarioService->where(array('situacao' => true), array('nome' => Constants::CRESCENTE))
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item['id'],
                    'descricao' => $item['nome'],
                ];
            });
        $eventos = $this->eventoService->all(['descricao' => Constants::CRESCENTE]);
        $funcoes = $this->funcaoService->all(['descricao' => Constants::CRESCENTE]);
        $data = $this->service->edit($id);

        return view('admin/escalas/edit')->with([
            'data' => $data,
            'eventos' => $eventos,
            'voluntarios' => $voluntarios,
            'funcoes' => $funcoes
        ]);
    }

    /**
     * @param EscalaRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(EscalaRequest $request, $id)
    {
        $this->checkPermission('adm-editar-escala');
        $this->setDataEscala($request);
        $this->service->update($request, $id);
        return $this->redirectWithMessage('escalas', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-escala');
        $this->service->destroy($id);
        return $this->redirectWithMessage('escalas', __(Constants::SUCCESS_DESTROY));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editInfo($id)
    {
        $this->checkPermission('adm-editar-escala');
        $data = $this->service->edit($id);
        return view('admin/escalas/info')->with(['data' => $data]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateInfo(Request $request, $id)
    {
        $this->checkPermission('adm-editar-escala');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('escalas', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param EscalaRequest $request
     * @return void
     */
    private function setDataEscala(EscalaRequest $request)
    {
        $data = $request->get('dt_escala') . ' ' . $request->get('hr_escala') . ':00';
        $request->request->add(['data' => $data]);
    }
}
