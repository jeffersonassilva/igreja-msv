<?php

namespace App\Http\Controllers;

/**
 * Class AlbumController
 * @package App\Http\Controllers
 */
class AlbumController extends Controller
{
    /**
     * AlbumController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $pasta
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($pasta)
    {
        $data = array(
            [
                'pasta' => 'consagracao',
                'titulo' => 'Consagração',
                'descricao' => 'Consagração de obreiros 2020',
            ],
            [
                'pasta' => 'aniversario',
                'titulo' => 'Aniversário',
                'descricao' => '1º Aniversário da Igreja MSV e 7º de Ministério',
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

        $album = array_filter($data, function ($item) use ($pasta) {
            return $item['pasta'] === $pasta;
        });

        return view('album')->with('album', current($album));
    }
}
