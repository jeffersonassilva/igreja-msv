<?php

namespace App\Http\Controllers;

/**
 * Class PoliticaPrivacidadeController
 * @package App\Http\Controllers
 */
class PoliticaPrivacidadeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('politica-privacidade');
    }
}
