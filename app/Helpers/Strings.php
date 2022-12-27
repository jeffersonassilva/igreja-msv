<?php

namespace App\Helpers;

class Strings
{
    /**
     * @param $dia
     * @param $qntdLetras
     * @return false|string
     */
    public function getDiaSemanaAbreviado($dia, $qntdLetras)
    {
        return ($dia === 'Sábado' && $qntdLetras > 1)
            ? substr($dia, 0, $qntdLetras + 1)
            : substr($dia, 0, $qntdLetras);
    }
}
