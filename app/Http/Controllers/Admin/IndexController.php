<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\PastorService;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $propositos = $this->propositoService->all();
        $banners = $this->bannerService->all(['ordem' => 'asc', 'id' => 'asc']);
        $pastor = $this->pastorService->all();

        return view('admin/index')->with([
            'propositos' => $propositos,
            'banners' => $banners,
            'pastor' => $pastor->first(),
        ]);
    }
}
