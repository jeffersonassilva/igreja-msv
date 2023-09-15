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
     * @param $qntdVoluntariadoNecessario
     * @param $qntdVoluntarios
     * @return string
     */
    public static function getMsgQntdServicoPorVoluntario($qntdVoluntariadoNecessario, $qntdVoluntarios)
    {
        $quantidade = Calculos::getQntdNecessariaPorVoluntario($qntdVoluntariadoNecessario, $qntdVoluntarios);

        return 'Precisamos que cada voluntário participe pelo menos <strong class="text-sm">'
            . $quantidade . '</strong> ' . ($quantidade > 1 ? 'vezes' : 'vez') . ' neste mês.';
    }

    /**
     * @param Request $request
     * @return string
     */
    public static function getPeriodoRelatorioVoluntario(Request $request)
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
     * @param $numero
     * @return string
     */
    public static function getCartaoFormatado($numero)
    {
        $numero = preg_replace('/[^0-9]/', '', $numero);
        $mascarado = '';

        for ($i = 0; $i < strlen($numero); $i++) {
            if ($i > 0 && $i % 4 === 0) {
                $mascarado .= '-';
            }
            $mascarado .= $numero[$i];
        }

        return $mascarado;
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
}
