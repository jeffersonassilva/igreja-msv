<?php

namespace App\Services;

/**
 * Class MesService
 * @package App\Services
 */
class MesService
{
    const LISTA = [
        ['id' => 1, 'descricao' => 'Janeiro'],
        ['id' => 2, 'descricao' => 'Fevereiro'],
        ['id' => 3, 'descricao' => 'Março'],
        ['id' => 4, 'descricao' => 'Abril'],
        ['id' => 5, 'descricao' => 'Maio'],
        ['id' => 6, 'descricao' => 'Junho'],
        ['id' => 7, 'descricao' => 'Julho'],
        ['id' => 8, 'descricao' => 'Agosto'],
        ['id' => 9, 'descricao' => 'Setembro'],
        ['id' => 10, 'descricao' => 'Outubro'],
        ['id' => 11, 'descricao' => 'Novembro'],
        ['id' => 12, 'descricao' => 'Dezembro'],
    ];

    /**
     * @return array[]
     */
    public function all()
    {
        return self::LISTA;
    }

    /**
     * @param $id
     * @return mixed|null
     */
    static public function getDescricaoById($id)
    {
        foreach (self::LISTA as $item) {
            if ($item['id'] == $id) {
                return $item['descricao'];
            }
        }
        return null;
    }
}
