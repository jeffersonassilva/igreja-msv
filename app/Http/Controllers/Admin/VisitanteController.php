<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitanteRequest;
use App\Mail\VisitanteEmail;
use App\Services\VisitanteService;
use Illuminate\Support\Facades\Mail;

/**
 * Class VisitanteController
 * @package App\Http\Controllers
 */
class VisitanteController extends Controller
{
    /**
     * @var VisitanteService
     */
    private $service;

    /**
     * @param VisitanteService $service
     */
    public function __construct(VisitanteService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-visitante');
        $data = $this->service->paginate(['dt_visita' => 'desc']);
        return view('admin/visitantes/index')->with('visitantes', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('visitantes');
    }

    /**
     * @param VisitanteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VisitanteRequest $request)
    {
        $visitante = $this->service->store($request);

        Mail::to(['samucamj@gmail.com'])
            ->cc(['jeffersonassilva@gmail.com'])
            ->send(new VisitanteEmail($visitante));

        return $this->redirectWithMessage('visitantes.create', 'Visitante cadastrado com sucesso!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-visitante');
        $data = $this->service->edit($id);
        return view('admin/visitantes/edit')->with(['data' => $data]);
    }

    /**
     * @param VisitanteRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VisitanteRequest $request, $id)
    {
        $request->merge([
            'sem_sucesso' => $request->input('sem_sucesso', null),
            'congregando' => $request->input('congregando', null),
            'deseja_batismo' => $request->input('deseja_batismo', null),
            'membro_ativo' => $request->input('membro_ativo', null),
        ]);

        $this->checkPermission('adm-editar-visitante');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('visitantes', __(Constants::SUCCESS_UPDATE));
    }
}
