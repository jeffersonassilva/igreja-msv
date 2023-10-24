<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Strings;
use App\Helpers\UnserializeFilter;
use App\Http\Controllers\Controller;
use App\Services\EscalaService;
use App\Services\RelatorioService;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
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
    public function mensalVoluntarios(Request $request)
    {
        $this->checkPermission('adm-relatorio-mensal-voluntario');
        $this->getFiltroPadrao($request);
        $meses = $this->getListMonths();
        $anos = $this->getListYears($meses);
        $voluntarios = $this->getVoluntarios($request);

        return view('admin/relatorios/voluntarios')->with([
            'voluntarios' => $voluntarios,
            'anos' => $anos,
            'meses' => $meses
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function mensalVoluntariosDownload(Request $request)
    {
        $this->checkPermission('adm-relatorio-mensal-voluntario');
        $this->getFiltroPadrao($request);
        $periodo = Strings::getPeriodoRelatorio($request);
        $voluntarios = $this->getVoluntarios($request);

        $pdf = PDF::loadView('admin/relatorios/voluntarios-pdf', [
            'title' => 'Relatório - Voluntários',
            'periodo' => $periodo,
            'voluntarios' => $voluntarios,
            'data' => date('d/m/Y - H:i:s')
        ]);

        return $pdf->stream('relatorio_voluntarios' . ($request->get('periodo') ? '_' . $request->get('periodo') : null) . '.pdf');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function getVoluntarios(Request $request)
    {
        $filter = new UnserializeFilter();
        $where = $filter->getFilters($request->all());
        $order = $filter->getOrder($request);

        return $this->relatorioService->voluntarios($where, $order ?: array('presenca' => 'desc', 'nome' => 'asc'));
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

        $meses[date('Y-m')] = Carbon::parse(date('Y-m-d'))->format('Y') . ' - ' . ucfirst(Carbon::parse(date('Y-m-d'))->monthName);
        krsort($meses);

        return $meses;
    }

    /**
     * @param $list
     * @return array
     */
    private function getListYears($list)
    {
        $listaAnos = [];

        foreach ($list as $key => $value) {
            $listaAnos[substr($key, 0, 4)] = substr($key, 0, 4);
        }

        return $listaAnos;
    }

    /**
     * @param Request $request
     * @return Request
     */
    private function getFiltroPadrao(Request $request)
    {
        $request->request->add([
            'mes' => substr($request->get('periodo'), 5, 2),
            'ano' => substr($request->get('periodo'), 0, 4)
        ]);

        if (!$request->has('periodo')) {
            $request->request->add(['periodo' => date('Y-m'), 'ano' => date('Y'), 'mes' => date('m')]);
        }

        return $request;
    }
}
