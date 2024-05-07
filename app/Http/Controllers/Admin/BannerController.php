<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\BannerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller
{
    /**
     * @var BannerService
     */
    private $service;

    /**
     * @param BannerService $service
     */
    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->checkPermission('adm-adicionar-banner');
        return view('admin/banners/create');
    }

    /**
     * @param BannerRequest $request
     * @return RedirectResponse
     */
    public function store(BannerRequest $request)
    {
        $this->checkPermission('adm-adicionar-banner');
        $this->service->store($request);
        return $this->redirectWithMessage('site', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $id
     * @return Application|Factory|View
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
     * @return RedirectResponse
     */
    public function update(BannerRequest $request, $id)
    {
        $this->checkPermission('adm-editar-banner');
        $this->service->update($request, $id);
        return $this->redirectWithMessage('site', __(Constants::SUCCESS_UPDATE));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->checkPermission('adm-excluir-banner');
        $this->service->destroy($id);
        return $this->redirectWithMessage('site', __(Constants::SUCCESS_ARCHIVE));
    }
}
