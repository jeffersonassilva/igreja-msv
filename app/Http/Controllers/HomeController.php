<?php

namespace App\Http\Controllers;

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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $video = $this->getLastVideoYouTube();
        $fotos = array(
            [
                'url' => 'consagracao',
                'pasta' => 'consagracao',
                'titulo' => 'Consagração',
                'descricao' => 'Consagração de obreiros 2020',
            ],
            [
                'url' => 'aniversario',
                'pasta' => 'aniversario',
                'titulo' => 'Aniversário',
                'descricao' => '1º Aniversário da Igreja MSV',
            ],
            [
                'url' => 'confraternizacao-2020',
                'pasta' => 'confraternizacao_2020',
                'titulo' => 'Confraternização',
                'descricao' => 'Confraternização 2020',
            ],
            [
                'url' => 'projeto-sharon',
                'pasta' => 'projeto_sharon',
                'titulo' => 'Projeto Sharon',
                'descricao' => 'Fotos do projeto Sharon',
            ],
        );

        $banners = array(
            [
                'url-mobile' => 'img/banner/mobile/20220417143217.png',
                'url-web' => 'img/banner/web/20220417143217.png',
                'active' => true,
            ],
            [
                'url-mobile' => 'img/banner/mobile/20220416192833.png',
                'url-web' => 'img/banner/web/20220416192833.png',
                'active' => false,
            ],
        );

        return view('home')->with(['banners' => $banners, 'fotos' => $fotos, 'video' => $video]);
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
