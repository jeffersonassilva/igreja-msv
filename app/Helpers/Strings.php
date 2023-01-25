<?php

namespace App\Helpers;

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
     * @param $qntdVoluntariadoMes
     * @param $qntdVoluntariosTotal
     * @return string
     */
    public static function getMsgQntdServicoPorVoluntario($qntdVoluntariadoMes, $qntdVoluntariosTotal)
    {
        $quantidade = Calculos::getQntdNecessariaPorVoluntario($qntdVoluntariadoMes, $qntdVoluntariosTotal);

        return 'Precisamos que cada voluntário participe pelo menos <strong class="text-sm">'
            . $quantidade . '</strong> ' . ($quantidade > 1 ? 'vezes' : 'vez') . ' neste mês.';
    }
}
