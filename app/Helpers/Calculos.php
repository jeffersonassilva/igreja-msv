<?php

namespace App\Helpers;

class Calculos
{
    /**
     * @param array $data
     * @return int
     */
    public static function getQntdVoluntariadoNecessarioNoMes(array $data)
    {
        return array_reduce($data, function ($quantidade, $escala) {
            return $quantidade + $escala['evento']['qntd_voluntarios'];
        }, 0);
    }

    /**
     * @param array $data
     * @return int
     */
    public static function getQntdVoluntariadoPreenchidoNoMes(array $data)
    {
        return array_reduce($data, function ($quantidade, $escala) {
            return $quantidade + count($escala['voluntarios']);
        }, 0);
    }

    /**
     * @param $qntdVoluntariadoNecessario
     * @param $qntdVoluntarios
     * @return false|float|int
     */
    public static function getQntdNecessariaPorVoluntario($qntdVoluntariadoNecessario, $qntdVoluntarios)
    {
        if (!$qntdVoluntarios) {
            return 1;
        }

        return ceil($qntdVoluntariadoNecessario / $qntdVoluntarios);
    }
}
