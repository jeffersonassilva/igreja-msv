<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoluntarioRequest;
use App\Services\EscalaVoluntarioService;
use App\Services\VoluntarioService;
use Illuminate\Http\Request;

/**
 * Class VoluntarioController
 * @package App\Http\Controllers
 */
class VoluntarioController extends Controller
{
    /**
     * @var VoluntarioService
     */
    private $service;

    /**
     * @var EscalaVoluntarioService
     */
    private $escalaVoluntarioService;

    /**
     * @param VoluntarioService $service
     * @param EscalaVoluntarioService $escalaVoluntarioService
     */
    public function __construct(VoluntarioService $service, EscalaVoluntarioService $escalaVoluntarioService)
    {
        $this->service = $service;
        $this->escalaVoluntarioService = $escalaVoluntarioService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $this->checkPermission('adm-listar-voluntario');
        $data = $this->service->where($request->all(), array('nome' => Constants::CRESCENTE))->get();
        return view('admin/voluntarios/index')->with('voluntarios', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-voluntario');

        $listaDisponibilidades = array();
        foreach (Constants::DIAS_SEMANA_LISTA as $key => $disponibilidade) {
            $listaDisponibilidades[$key]['id'] = $key;
            $listaDisponibilidades[$key]['descricao'] = $disponibilidade;
        }

        return view('admin/voluntarios/create')->with([
            'disponibilidades' => $listaDisponibilidades
        ]);
    }

    /**
     * @param VoluntarioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VoluntarioRequest $request)
    {
        $this->checkPermission('adm-adicionar-voluntario');
        $this->service->store($request);
        return $this->redirectWithMessage('voluntarios', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-voluntario');
        $data = $this->service->edit($id);
        $disponibilidades = Constants::DIAS_SEMANA_LISTA;
        $arrayDisponibilidades = [];
        $arrayDisponibilidadesCadastradas = [];

        foreach ($data->disponibilidades as $disponibilidade) {
            $arrayDisponibilidadesCadastradas[] = $disponibilidade->dia;
        }

        foreach ($disponibilidades as $key => $disponibilidade) {
            $arrayDisponibilidades[$key]['id'] = $key;
            $arrayDisponibilidades[$key]['descricao'] = $disponibilidade;
            $arrayDisponibilidades[$key]['checked'] = in_array($key, $arrayDisponibilidadesCadastradas);
        }

        return view('admin/voluntarios/edit')->with(['data' => $data, 'disponibilidades' => $arrayDisponibilidades]);
    }

    /**
     * @param VoluntarioRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VoluntarioRequest $request, $id)
    {
        $this->checkPermission('adm-editar-voluntario');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('voluntarios', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $this->checkPermission('adm-detalhar-voluntario');
        $data = $this->service->find($id);
        $escalas = $this->escalaVoluntarioService->listaEscalasPorVoluntarioId($id);
        return view('admin/voluntarios/show')->with(['data' => $data, 'escalas' => $escalas]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-voluntario');
        $this->service->destroy($id);
        return $this->redirectWithMessage('voluntarios', __(Constants::SUCCESS_DESTROY));
    }
}
