<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\PastorService;
use App\Services\PropositoService;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
     * @var PastorService
     */
    private $pastorService;

    /**
     * @param PropositoService $propositoService
     * @param BannerService $bannerService
     * @param PastorService $pastorService
     */
    public function __construct(
        PropositoService $propositoService,
        BannerService    $bannerService,
        PastorService    $pastorService
    )
    {
        $this->propositoService = $propositoService;
        $this->bannerService = $bannerService;
        $this->pastorService = $pastorService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('admin/index');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function site(Request $request)
    {
        $propositos = $this->propositoService->all();
        $banners = $this->bannerService->all(['ordem' => 'asc', 'id' => 'asc']);
        $pastor = $this->pastorService->all();

        return view('admin/site/index')->with([
            'propositos' => $propositos,
            'banners' => $banners,
            'pastor' => $pastor->first(),
        ]);
    }
}
