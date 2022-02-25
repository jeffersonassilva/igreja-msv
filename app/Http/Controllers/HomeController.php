<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = array(
            [
                'album' => 'consagracao',
                'titulo' => 'Consagração',
                'descricao' => 'Consagração de obreiros 2020',
            ],
            [
                'album' => 'aniversario',
                'titulo' => 'Aniversário',
                'descricao' => '1º Aniversário da Igreja MSV e 7º de Ministério',
            ],
            [
                'album' => 'confraternizacao_2020',
                'titulo' => 'Confraternização',
                'descricao' => 'Confraternização 2020',
            ],
            [
                'album' => 'projeto_sharon',
                'titulo' => 'Projeto Sharon',
                'descricao' => 'Fotos do projeto Sharon',
            ],
        );

        return view('home')->with('fotos', $data);
    }
}
