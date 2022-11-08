<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PastorRequest;
use App\Services\PastorService;

class PastorController extends Controller
{
    /**
     * @var PastorService
     */
    private $service;

    /**
     * IndexController constructor.
     * @param PastorService $service
     */
    public function __construct(PastorService $service)
    {
        $this->service = $service;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-pastor');
        $pastor = $this->service->edit($id);
        return view('admin/pastor/edit')->with(['pastor' => $pastor]);
    }

    /**
     * @param PastorRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PastorRequest $request, $id)
    {
        $this->checkPermission('adm-editar-pastor');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('dashboard', __(Constants::SUCCESS_UPDATE));
    }
}
