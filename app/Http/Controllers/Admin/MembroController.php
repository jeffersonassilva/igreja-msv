<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembroRequest;
use App\Services\EstadoCivilService;
use App\Services\MembroService;
use App\Services\UfService;

/**
 * Class MembroController
 * @package App\Http\Controllers
 */
class MembroController extends Controller
{
    /**
     * @var MembroService
     */
    private $service;

    /**
     * @var EstadoCivilService
     */
    private $estadoCivilService;

    /**
     * @var UfService
     */
    private $ufService;

    /**
     * @param MembroService $service
     * @param EstadoCivilService $estadoCivilService
     * @param UfService $ufService
     */
    public function __construct(
        MembroService      $service,
        EstadoCivilService $estadoCivilService,
        UfService          $ufService
    )
    {
        $this->service = $service;
        $this->estadoCivilService = $estadoCivilService;
        $this->ufService = $ufService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-membro');
        $data = $this->service->paginate();
        return view('admin/membros/index')->with('membros', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-membro');
        $estadosCivis = $this->estadoCivilService->all();
        $ufs = $this->ufService->all();

        return view('admin/membros/create')->with([
            'estadosCivis' => $estadosCivis,
            'ufs' => $ufs
        ]);
    }

    /**
     * @param MembroRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MembroRequest $request)
    {
        $this->checkPermission('adm-adicionar-membro');
        $this->service->store($request);
        return $this->redirectWithMessage('membros', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-membro');
        $data = $this->service->edit($id);
        $estadosCivis = $this->estadoCivilService->all();
        $ufs = $this->ufService->all();

        return view('admin/membros/edit')->with([
            'data' => $data,
            'estadosCivis' => $estadosCivis,
            'ufs' => $ufs
        ]);
    }

    /**
     * @param MembroRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MembroRequest $request, $id)
    {
        $this->checkPermission('adm-editar-membro');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('membros', __(Constants::SUCCESS_UPDATE));
    }

//    /**
//     * @param $id
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function destroy($id)
//    {
//        $this->checkPermission('adm-excluir-membro');
//        $this->service->destroy($id);
//        return $this->redirectWithMessage('membros', __(Constants::SUCCESS_DESTROY));
//    }
}
