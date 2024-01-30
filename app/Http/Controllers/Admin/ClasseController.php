<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use App\Services\ClasseService;

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
        $this->checkPermission('adm-listar-classes');
        $data = $this->service->paginate(['nome' => 'asc']);
        return view('admin/classes/index')->with('classes', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-classe');

        return view('admin/classes/create');
    }

    /**
     * @param ClasseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClasseRequest $request)
    {
        $this->checkPermission('adm-adicionar-classe');
        $this->service->store($request);
        return $this->redirectWithMessage('classes', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-classe');
        $data = $this->service->edit($id);
        return view('admin/classes/edit')->with(['data' => $data]);
    }

    /**
     * @param ClasseRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClasseRequest $request, $id)
    {
        $this->checkPermission('adm-editar-classe');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('classes', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-classe');
        $this->service->destroy($id);
        return $this->redirectWithMessage('classes', __(Constants::SUCCESS_DESTROY));
    }
}
