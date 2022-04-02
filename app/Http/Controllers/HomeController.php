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
    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $video = $this->getLastVideoYouTube();
        $data = array(
            [
                'pasta' => 'consagracao',
                'titulo' => 'Consagração',
                'descricao' => 'Consagração de obreiros 2020',
            ],
            [
                'pasta' => 'aniversario',
                'titulo' => 'Aniversário',
                'descricao' => '1º Aniversário da Igreja MSV',
            ],
            [
                'pasta' => 'confraternizacao_2020',
                'titulo' => 'Confraternização',
                'descricao' => 'Confraternização 2020',
            ],
            [
                'pasta' => 'projeto_sharon',
                'titulo' => 'Projeto Sharon',
                'descricao' => 'Fotos do projeto Sharon',
            ],
        );

        return view('home')->with(['fotos' => $data, 'video' => $video]);
    }

    /**
     * @return array|mixed
     */
    private function getLastVideoYouTube()
    {
        if (Cache::has('msv::youtube-last-video')) {
            $lastVideo = Cache::get('msv::youtube-last-video');
        } else {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'key' => env('API_YOUTUBE_KEY'),
                'channelId' => env('API_YOUTUBE_CHANNEL_ID'),
                'part' => 'snippet,id',
                'order' => 'date',
                'maxResults' => '1',
            ]);

            $lastVideo = $response->json('items') ? $response->json('items')[0] : array();
            Cache::put('msv::youtube-last-video', $lastVideo, (60 * 60));
        }

        return $lastVideo;
    }
}
