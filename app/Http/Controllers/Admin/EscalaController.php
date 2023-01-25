<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Calculos;
use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EscalaRequest;
use App\Services\EscalaFuncaoService;
use App\Services\EscalaService;
use App\Services\EventoService;
use App\Services\VoluntarioService;
use Illuminate\Http\Request;

/**
 * Class EscalaController
 * @package App\Http\Controllers
 */
class EscalaController extends Controller
{
    /**
     * @var EscalaService
     */
    private $service;

    /**
     * @var EscalaFuncaoService
     */
    private $escalaFuncaoService;

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
     * @param EscalaFuncaoService $escalaFuncaoService
     * @param EventoService $eventoService
     * @param VoluntarioService $voluntarioService
     */
    public function __construct(
        EscalaService $service,
        EscalaFuncaoService $escalaFuncaoService,
        EventoService $eventoService,
        VoluntarioService $voluntarioService
    )
    {
        $this->service = $service;
        $this->escalaFuncaoService = $escalaFuncaoService;
        $this->eventoService = $eventoService;
        $this->voluntarioService = $voluntarioService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(Request $request)
    {
        $data = $this->service->list($request->all());
        $qntdVoluntariadoMes = Calculos::getQntdGeralVoluntariadoDoMes($data->toArray());
        $qntdVoluntariadoPreenchido = Calculos::getQntdVoluntariadoPreenchido($data->toArray());
        $funcoes = $this->escalaFuncaoService->list();
        $voluntarios = $this->voluntarioService->all(array('nome' => Constants::CRESCENTE));
        $eventos = $this->eventoService->all();

        return view('escalas')->with([
            'escalas' => $data,
            'funcoes' => $funcoes,
            'voluntarios' => $voluntarios,
            'eventos' => $eventos,
            'qntdVoluntariadoMes' => $qntdVoluntariadoMes,
            'qntdVoluntariadoPreenchido' => $qntdVoluntariadoPreenchido,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $this->checkPermission('adm-listar-escala');
        $eventos = $this->eventoService->all();
        $data = $this->service->list($request->all());
        return view('admin/escalas/index')->with(['escalas' => $data, 'eventos' => $eventos]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-escala');
        $eventos = $this->eventoService->where(['situacao' => Constants::TRUE], ['descricao' => Constants::CRESCENTE])->get();
        return view('admin/escalas/create', array('eventos' => $eventos));
    }

    /**
     * @param EscalaRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-escala');
        $voluntarios = $this->voluntarioService->all(array('nome' => Constants::CRESCENTE));
        $eventos = $this->eventoService->all(['descricao' => Constants::CRESCENTE]);
        $data = $this->service->edit($id);
        return view('admin/escalas/edit')->with([
            'data' => $data,
            'eventos' => $eventos,
            'voluntarios' => $voluntarios
        ]);
    }

    /**
     * @param EscalaRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-escala');
        $this->service->destroy($id);
        return $this->redirectWithMessage('escalas', __(Constants::SUCCESS_DESTROY));
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
