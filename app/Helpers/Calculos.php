<?php

namespace App\Helpers;

class Calculos
{
    /**
     * @param array $data
     * @return int
     */
    public static function getQntdGeralVoluntariadoDoMes(array $data)
    {
        return array_reduce($data, function ($quantidade, $escala) {
            return $quantidade + $escala['evento']['qntd_voluntarios'];
        }, 0);
    }

    /**
     * @param array $data
     * @return int
     */
    public static function getQntdVoluntariadoPreenchido(array $data)
    {
        return array_reduce($data, function ($quantidade, $escala) {
            return $quantidade + count($escala['voluntarios']);
        }, 0);
    }

    /**
     * @param $qntdVoluntariadoMes
     * @param $qntdVoluntariosTotal
     * @return false|float|int
     */
    public static function getQntdNecessariaPorVoluntario($qntdVoluntariadoMes, $qntdVoluntariosTotal)
    {
        if (!$qntdVoluntariosTotal) {
            return 1;
        }

        return ceil($qntdVoluntariadoMes / $qntdVoluntariosTotal);
    }
}
