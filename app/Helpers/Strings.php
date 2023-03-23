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
}
