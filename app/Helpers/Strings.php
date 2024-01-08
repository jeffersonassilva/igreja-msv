<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class Strings
{
    /**
     * @param $dia
     * @param $qntdLetras
     * @return false|string
     */
    public static function getDiaSemanaAbreviado($dia, $qntdLetras)
    {
        return ($dia === 'Sábado' && $qntdLetras > 1)
            ? substr($dia, 0, $qntdLetras + 1)
            : substr($dia, 0, $qntdLetras);
    }

    /**
     * @param Request $request
     * @return string
     */
    public static function getPeriodoRelatorio(Request $request)
    {
        $mes = $request->get('mes') ? ucfirst(Carbon::parse($request->get('periodo'))->monthName) : null;
        $ano = $request->get('ano') ? $request->get('ano') : null;
        $texto = $mes ? $mes . ' / ' . $ano : $ano;

        if (!$mes && !$ano) {
            $texto = 'Geral';
        }

        return 'Período: ' . $texto;
    }

    /**
     * @param $numeroCartao
     * @return string
     */
    public static function getCartaoFormatado($numeroCartao)
    {
        $ultimosQuatroDigitos = substr($numeroCartao, -4);

        return '**** **** **** ' . $ultimosQuatroDigitos;
    }

    /**
     * @param $valor
     * @param $prefix
     * @return string
     */
    public static function getMoedaFormatada($valor, $prefix = null)
    {
        return $prefix . number_format($valor,2,',','.');
    }

    /**
     * @param $codigo
     * @return string
     */
    public static function getNomeCategoria($codigo)
    {
        $categorias = [
            1 => 'Despesa com Pessoal',
            2 => 'Despesa com Impostos',
            3 => 'Despesas Administrativas',
            4 => 'Despesa com Aquisições',
            5 => 'Despesa com Serviços',
            6 => 'Despesas com Manutenções',
            7 => 'Despesas Financeiras',
            8 => 'Despesas com Construção',
            9 => 'Despesas com Eventos',
            10 => 'Despesas com Tecnologia',
        ];

        return $categorias[$codigo];
    }

    /**
     * @param $pontuacao
     * @return string
     */
    public static function renderizarEstrelas($pontuacao)
    {
        $estrelas = '';

        for ($i = 1; $i <= 5; $i++) {
            $estrelas .= ($i <= $pontuacao) ? '★' : '☆';
        }

        return $estrelas;
    }
}
