<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RelatorioService;

class RelatorioController extends Controller
{
    /**
     * @var RelatorioService
     */
    private $relatorioService;

    /**
     * @param RelatorioService $relatorioService
     */
    public function __construct(RelatorioService $relatorioService)
    {
        $this->relatorioService = $relatorioService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function voluntarios()
    {
        $voluntarios = $this->relatorioService->voluntarios();
        return view('admin/relatorios/voluntarios')->with(['voluntarios' => $voluntarios]);
    }
}
