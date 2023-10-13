<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotaFiscalService;

class RelatoriosTerourariaController extends Controller
{
    /**
     * @var NotaFiscalService
     */
    private $notaFiscalService;

    /**
     * @param NotaFiscalService $notaFiscalService
     */
    public function __construct(NotaFiscalService $notaFiscalService)
    {
        $this->notaFiscalService = $notaFiscalService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-menu-relatorios-tesouraria');
        $notas = $this->notaFiscalService->allWithRelantions(['cartao']);
        $valorTotal = $this->valorTotal($notas);
        $data = $this->agruparNotasPorCartao($notas->toArray());

        return view('admin/relatorios-tesouraria/index')->with([
            'lista' => $data,
            'valorTotal' => $valorTotal,
        ]);
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
}
