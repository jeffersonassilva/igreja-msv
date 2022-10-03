<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UnserializeFilter;
use App\Http\Controllers\Controller;
use App\Services\RelatorioService;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function voluntarios(Request $request)
    {
        $filter = new UnserializeFilter();
        $order = $filter->getOrder($request);

        $voluntarios = $this->relatorioService->voluntarios(array(), $order);
        return view('admin/relatorios/voluntarios')->with(['voluntarios' => $voluntarios]);
    }
}
