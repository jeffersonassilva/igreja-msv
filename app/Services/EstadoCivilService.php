<?php

namespace App\Services;

class EstadoCivilService
{
    const LISTA = [
        ['id' => 1, 'descricao' => 'Solteiro'],
        ['id' => 2, 'descricao' => 'Casado(a)'],
        ['id' => 3, 'descricao' => 'Separado(a)'],
        ['id' => 4, 'descricao' => 'Divorciado(a)'],
        ['id' => 5, 'descricao' => 'Viúvo(a)'],
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
    public static function getDescricaoById($id)
    {
        foreach (self::LISTA as $item) {
            if ($item['id'] == $id) {
                return $item['descricao'];
            }
        }
        return null;
    }
}
