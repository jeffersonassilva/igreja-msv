<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\PastorRequest;
use App\Services\PastorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @return Application|Factory|View
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
     * @return RedirectResponse
     */
    public function update(PastorRequest $request, $id)
    {
        $this->checkPermission('adm-editar-pastor');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('site', __(Constants::SUCCESS_UPDATE));
    }
}
