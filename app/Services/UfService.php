<?php

namespace App\Services;

/**
 * Class UfService
 * @package App\Services
 */
class UfService
{
    const LISTA = [
        ['id' => 'AC', 'descricao' => 'AC'],
        ['id' => 'AL', 'descricao' => 'AL'],
        ['id' => 'AP', 'descricao' => 'AP'],
        ['id' => 'AM', 'descricao' => 'AM'],
        ['id' => 'BA', 'descricao' => 'BA'],
        ['id' => 'CE', 'descricao' => 'CE'],
        ['id' => 'DF', 'descricao' => 'DF'],
        ['id' => 'ES', 'descricao' => 'ES'],
        ['id' => 'GO', 'descricao' => 'GO'],
        ['id' => 'MA', 'descricao' => 'MA'],
        ['id' => 'MT', 'descricao' => 'MT'],
        ['id' => 'MS', 'descricao' => 'MS'],
        ['id' => 'MG', 'descricao' => 'MG'],
        ['id' => 'PA', 'descricao' => 'PA'],
        ['id' => 'PB', 'descricao' => 'PB'],
        ['id' => 'PR', 'descricao' => 'PR'],
        ['id' => 'PE', 'descricao' => 'PE'],
        ['id' => 'PI', 'descricao' => 'PI'],
        ['id' => 'RJ', 'descricao' => 'RJ'],
        ['id' => 'RN', 'descricao' => 'RN'],
        ['id' => 'RS', 'descricao' => 'RS'],
        ['id' => 'RO', 'descricao' => 'RO'],
        ['id' => 'RR', 'descricao' => 'RR'],
        ['id' => 'SC', 'descricao' => 'SC'],
        ['id' => 'SP', 'descricao' => 'SP'],
        ['id' => 'SE', 'descricao' => 'SE'],
        ['id' => 'TO', 'descricao' => 'TO'],
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
