<?php

namespace App\Services;

/**
 * Class CategoriaService
 * @package App\Services
 */
class CategoriaService
{
    const LISTA = [
        ['id' => 1, 'descricao' => 'Despesa com Pessoal'],
        ['id' => 2, 'descricao' => 'Despesa com Impostos'],
        ['id' => 3, 'descricao' => 'Despesas Administrativas'],
        ['id' => 4, 'descricao' => 'Despesa com Aquisições'],
        ['id' => 5, 'descricao' => 'Despesa com Serviços'],
        ['id' => 6, 'descricao' => 'Despesas com Manutenções'],
        ['id' => 7, 'descricao' => 'Despesas Financeiras'],
        ['id' => 8, 'descricao' => 'Despesas com Construção'],
        ['id' => 9, 'descricao' => 'Despesas com Eventos'],
        ['id' => 10, 'descricao' => 'Despesas com Tecnologia'],
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
