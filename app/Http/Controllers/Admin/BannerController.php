<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\BannerService;

class BannerController extends Controller
{
    /**
     * @var BannerService
     */
    private $service;

    /**
     * BannerController constructor.
     * @param BannerService $service
     */
    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-banner');
        return view('admin/banners/create');
    }

    /**
     * @param BannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BannerRequest $request)
    {
        $this->checkPermission('adm-adicionar-banner');
        $this->service->store($request);
        return $this->redirectWithMessage('dashboard', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->checkPermission('adm-editar-banner');
        $data = $this->service->edit($id);
        return view('admin/banners/edit')->with(['data' => $data]);
    }

    /**
     * @param BannerRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BannerRequest $request, $id)
    {
        $this->checkPermission('adm-editar-banner');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('dashboard', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-banner');
        $this->service->destroy($id);
        return $this->redirectWithMessage('dashboard', __(Constants::SUCCESS_ARCHIVE));
    }
}
