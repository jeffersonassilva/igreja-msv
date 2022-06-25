<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\PropositoService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @var PropositoService
     */
    private $propositoService;

    /**
     * @var BannerService
     */
    private $bannerService;

    /**
     * @param PropositoService $propositoService
     * @param BannerService $bannerService
     */
    public function __construct(PropositoService $propositoService, BannerService $bannerService)
    {
        $this->propositoService = $propositoService;
        $this->bannerService = $bannerService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $propositos = $this->propositoService->all();
        $banners = $this->bannerService->all(['ordem' => 'asc', 'id' => 'asc']);

        return view('admin/index')->with([
            'propositos' => $propositos,
            'banners' => $banners
        ]);
    }
}
