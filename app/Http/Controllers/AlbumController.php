<?php

namespace App\Http\Controllers;

/**
 * Class AlbumController
 * @package App\Http\Controllers
 */
class AlbumController extends Controller
{
    /**
     * @param $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($url)
    {
        $data = array(
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
                'descricao' => '1º Aniversário da Igreja MSV e 7º de Ministério',
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

        $album = array_filter($data, function ($item) use ($url) {
            return $item['url'] === $url;
        });

        return view('album')->with('album', current($album));
    }
}
