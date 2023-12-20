<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitanteRequest;
use App\Mail\VisitanteEmail;
use App\Services\MembroService;
use App\Services\VisitanteService;
use Illuminate\Http\Request;
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
     * @var MembroService
     */
    private $membroService;

    /**
     * @param VisitanteService $service
     * @param MembroService $membroService
     */
    public function __construct(VisitanteService $service, MembroService $membroService)
    {
        $this->service = $service;
        $this->membroService = $membroService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-visitante');
        $data = $this->service->where(['sem_sucesso' => null, 'membro_ativo' => null], ['dt_visita' => 'desc'])->paginate();
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

        Mail::to(['samucamj@gmail.com', 'nraniely@gmail.com'])
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

        if ($request->get('membro_ativo')) {
            $this->transformarVisitanteEmMembro($request, $id);
        }

        $this->checkPermission('adm-editar-visitante');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('visitantes', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \App\Models\Membro
     */
    private function transformarVisitanteEmMembro(Request $request, $id)
    {
        $data = $this->service->find($id);
        return $this->membroService->transformarVisitanteEmMembro($data);
    }
}
