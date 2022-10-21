<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UnserializeFilter;
use App\Http\Controllers\Controller;
use App\Services\EscalaService;
use App\Services\RelatorioService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    /**
     * @var RelatorioService
     */
    private $relatorioService;

    /**
     * @var EscalaService
     */
    private $escalaService;

    /**
     * @param RelatorioService $relatorioService
     * @param EscalaService $escalaService
     */
    public function __construct(RelatorioService $relatorioService, EscalaService $escalaService)
    {
        $this->relatorioService = $relatorioService;
        $this->escalaService = $escalaService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function voluntarios(Request $request)
    {
        $request->has('mes') ?: $request->request->add(['mes' => date('Y-m')]);
        $meses = $this->getListMonths();
        $voluntarios = $this->getVoluntarios($request);

        return view('admin/relatorios/voluntarios')->with(['voluntarios' => $voluntarios, 'meses' => $meses]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getVoluntarios(Request $request)
    {
        $filter = new UnserializeFilter();
        $where = $filter->getFilters($request->all());
        $order = $filter->getOrder($request);

        return $this->relatorioService->voluntarios($where, $order ?: array('quantidade' => 'desc', 'nome' => 'asc'));
    }

    /**
     * @return array
     */
    private function getListMonths()
    {
        $meses = array();
        $escalas = $this->escalaService->all();

        foreach ($escalas as $escala) {
            $meses[Carbon::parse($escala['data'])->format('Y') . '-' . Carbon::parse($escala['data'])->format('m')] =
                Carbon::parse($escala['data'])->format('Y') . ' - ' . ucfirst(Carbon::parse($escala['data'])->monthName);
        }

        return $meses;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $request->has('mes') ?: $request->request->add(['mes' => date('Y-m')]);
        $mes = $request->get('mes');
        $periodo = 'Período: ' . ($mes ? ucfirst(Carbon::parse($mes)->monthName) . ' - ' . Carbon::parse($mes)->format('Y') : 'Geral');
        $voluntarios = $this->getVoluntarios($request);

        $pdf = PDF::loadView('admin/relatorios/voluntarios-pdf', [
            'title' => 'Relatório - Voluntários',
            'periodo' => $periodo,
            'voluntarios' => $voluntarios,
            'data' => date('d/m/Y - H:i:s')
        ]);

        return $pdf->stream('relatorio_voluntarios_' . ($request->get('mes') ? $request->get('mes') : 'geral') . '.pdf');
    }
}
