<?php

namespace App\Http\Controllers\Admin\EBD;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\EBD\ClasseRequest;
use App\Services\EBD\ClasseService;

/**
 * Class ClasseController
 * @package App\Http\Controllers
 */
class ClasseController extends Controller
{
    /**
     * @var ClasseService
     */
    private $service;

    /**
     * @param ClasseService $service
     */
    public function __construct(ClasseService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-ebd-classes');
        $data = $this->service->paginate(['nome' => 'asc']);
        return view('admin/ebd/classes/index')->with('classes', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-ebd-classe');

        return view('admin/ebd/classes/create');
    }

    /**
     * @param ClasseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClasseRequest $request)
    {
        $this->checkPermission('adm-adicionar-ebd-classe');
        $this->service->store($request);
        return $this->redirectWithMessage('classes', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-ebd-classe');
        $data = $this->service->edit($id);
        return view('admin/ebd/classes/edit')->with(['data' => $data]);
    }

    /**
     * @param ClasseRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClasseRequest $request, $id)
    {
        $this->checkPermission('adm-editar-ebd-classe');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('classes', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-ebd-classe');
        $this->service->destroy($id);
        return $this->redirectWithMessage('classes', __(Constants::SUCCESS_DESTROY));
    }
}
