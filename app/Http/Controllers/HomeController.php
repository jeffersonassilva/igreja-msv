<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Services\BannerService;
use App\Services\PastorService;
use App\Services\PropositoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
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
        $video = $this->getLastVideoYouTube();
        $banners = $this->bannerService->all(['ordem' => 'asc', 'id' => 'asc'], Constants::CACHE_LISTA_BANNERS);
        $propositos = $this->propositoService->all(array(), Constants::CACHE_LISTA_PROPOSITOS);
        $pastor = $this->pastorService->all(array(), Constants::CACHE_LISTA_PASTORES);

        return view('home')->with([
            'banners' => $banners,
            'video' => $video,
            'propositos' => $propositos,
            'pastor' => $pastor->first(),
        ]);
    }

    /**
     * @return array|mixed
     */
    private function getLastVideoYouTube()
    {
        if (Cache::has(Constants::CACHE_YOUTUBE_KEY)) {
            $lastVideo = Cache::get(Constants::CACHE_YOUTUBE_KEY);
        } else {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'key' => env('API_YOUTUBE_KEY'),
                'channelId' => env('API_YOUTUBE_CHANNEL_ID'),
                'part' => 'snippet,id',
                'order' => 'date',
                'maxResults' => '1',
            ]);

            $lastVideo = $response->json('items') ? $response->json('items')[0] : array();
            Cache::put(Constants::CACHE_YOUTUBE_KEY, $lastVideo, (60 * 60));
        }

        return $lastVideo;
    }
}
