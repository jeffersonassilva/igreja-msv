<?php

namespace App\Http\Controllers;

use App\Services\BannerService;
use App\Services\PropositoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    const CACHE_YOUTUBE_KEY = 'msv::youtube-last-video';

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
        $video = $this->getLastVideoYouTube();
        $banners = $this->bannerService->all(['ordem' => 'asc', 'id' => 'asc']);
        $propositos = $this->propositoService->all();

        return view('home')->with(['banners' => $banners, 'video' => $video, 'propositos' => $propositos]);
    }

    /**
     * @return array|mixed
     */
    private function getLastVideoYouTube()
    {
        if (Cache::has(self::CACHE_YOUTUBE_KEY)) {
            $lastVideo = Cache::get(self::CACHE_YOUTUBE_KEY);
        } else {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'key' => env('API_YOUTUBE_KEY'),
                'channelId' => env('API_YOUTUBE_CHANNEL_ID'),
                'part' => 'snippet,id',
                'order' => 'date',
                'maxResults' => '1',
            ]);

            $lastVideo = $response->json('items') ? $response->json('items')[0] : array();
            Cache::put(self::CACHE_YOUTUBE_KEY, $lastVideo, (60 * 60));
        }

        return $lastVideo;
    }
}
