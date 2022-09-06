<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\VoluntarioRequest;
use App\Services\VoluntarioService;

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
     * @param VoluntarioService $service
     */
    public function __construct(VoluntarioService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = $this->service->all(array('nome' => Constants::CRESCENTE));
        return view('admin/voluntarios/index')->with('voluntarios', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin/voluntarios/create');
    }

    /**
     * @param VoluntarioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VoluntarioRequest $request)
    {
        $this->service->store($request);
        return $this->redirectWithMessage('voluntarios', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data = $this->service->edit($id);
        return view('admin/voluntarios/edit')->with(['data' => $data]);
    }

    /**
     * @param VoluntarioRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VoluntarioRequest $request, $id)
    {
        $this->service->update($request, $id);
        return $this->redirectWithMessage('voluntarios', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return $this->redirectWithMessage('voluntarios', __(Constants::SUCCESS_DESTROY));
    }
}
