<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Strings;
use App\Http\Controllers\Controller;
use App\Services\CategoriaService;
use App\Services\MesService;
use App\Services\NotaFiscalService;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class RelatoriosTerourariaController extends Controller
{
    /**
     * @var NotaFiscalService
     */
    private $notaFiscalService;

    /**
     * @var CategoriaService
     */
    private $categoriaService;

    /**
     * @var MesService
     */
    private $mesService;

    /**
     * @param NotaFiscalService $notaFiscalService
     * @param CategoriaService $categoriaService
     * @param MesService $mesService
     */
    public function __construct(NotaFiscalService $notaFiscalService, CategoriaService $categoriaService, MesService $mesService)
    {
        $this->notaFiscalService = $notaFiscalService;
        $this->categoriaService = $categoriaService;
        $this->mesService = $mesService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $this->checkPermission('adm-menu-relatorios-tesouraria');
        if (!$request->all()) {
            $request->request->add([
                'mes' => date('m'),
                'ano' => date('Y'),
            ]);
        }
        $notas = $this->notaFiscalService->relatorioNotasPorCartao($request->all())->get();
        $valorTotal = $this->valorTotal($notas);
        $data = $this->agruparNotasPorCartao($notas->toArray());

        return view('admin/relatorios-tesouraria/index')->with([
            'lista' => $data,
            'valorTotal' => $valorTotal,
            'meses' => $this->mesService->all(),
            'categorias' => $this->categoriaService->all(),
            'anos' => $this->getUltimos5Anos(),
            'filtro' => $request,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function relatorioPorCartaoPdf(Request $request)
    {
        $this->checkPermission('adm-menu-relatorios-tesouraria');
        if (!$request->all()) {
            $request->request->add([
                'mes' => date('m'),
                'ano' => date('Y'),
            ]);
        }
        $notas = $this->notaFiscalService->relatorioNotasPorCartao($request->all())->get();
        $valorTotal = $this->valorTotal($notas);
        $data = $this->agruparNotasPorCartao($notas->toArray());
        $periodo = Strings::getPeriodoRelatorio($request);

        $pdf = PDF::loadView('admin/relatorios-tesouraria/por-cartao-pdf', [
            'title' => 'Relatório - Por Cartão',
            'periodo' => $periodo,
            'notas' => $data,
            'valorTotal' => $valorTotal,
            'data' => date('d/m/Y - H:i:s'),
            'filtro' => $request
        ]);

        return $pdf->stream('relatorio_voluntarios' . ($request->get('periodo') ? '_' . $request->get('periodo') : null) . '.pdf');
    }

    /**
     * @param $notas
     * @return int
     */
    private function valorTotal($notas)
    {
        $total = 0;
        foreach ($notas as $nota) {
            $total += $nota['valor'];
        }

        return $total;
    }

    /**
     * @param $data
     * @return array
     */
    private function agruparNotasPorCartao($data)
    {
        $listaAgrupada = array();
        $data = $this->ordenarListaPorData($data);

        foreach ($data as $nota) {
            if (isset($nota['cartao_id']) && !empty($nota['cartao_id'])) {
                $listaAgrupada[$nota['cartao']['identificador']]['itens'][] = $nota;
            } else {
                $listaAgrupada['dinheiro']['itens'][] = $nota;
            }
        }

        $listaAgrupada = $this->calculaValoresTotaisPorCartao($listaAgrupada);
        ksort($listaAgrupada);

        return $listaAgrupada;
    }

    /**
     * @param $lista
     * @return mixed
     */
    private function calculaValoresTotaisPorCartao($lista)
    {
        foreach ($lista as $key => &$grupo) {
            $grupo['total'] = 0;
            foreach ($grupo['itens'] as $item) {
                $grupo['total'] += $item['valor'];
            }
        }

        return $lista;
    }

    /**
     * @param $data
     * @return mixed
     */
    private function ordenarListaPorData($data)
    {
        usort($data, function ($a, $b) {
            return strcmp($a['data'], $b['data']);
        });

        return $data;
    }

    /**
     * @return array
     */
    private function getUltimos5Anos()
    {
        $anos = [];
        $anoAtual = date('Y');

        for ($i = 0; $i < 5; $i++) {
            $ano = $anoAtual - $i;
            $anos[] = ['id' => $ano, 'descricao' => $ano];
        }

        return $anos;
    }
}
