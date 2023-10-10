<?php

namespace App\Services;

use App\Helpers\Strings;
use App\Models\Cartao;

/**
 * Class CartaoService
 * @package App\Services
 */
class CartaoService extends AbstractService
{
    /**
     * @var Cartao
     */
    protected $model;

    /**
     * CartaoService constructor.
     */
    public function __construct()
    {
        $this->model = new Cartao();
    }

    /**
     * @param $identificador
     * @return mixed
     */
    public function findByIdentificador($identificador)
    {
        return $this->model->where(['identificador' => $identificador])->first();
    }

    /**
     * @param $id
     * @param $description
     * @return array|array[]
     */
    public function pluck($id, $description)
    {
        $lista = array_map(function($n) {
            return [
                'id' => $n['id'],
                'descricao' => Strings::getCartaoFormatado($n['descricao'])
            ];
        }, parent::pluck($id, $description));

        return $lista;
    }
}
