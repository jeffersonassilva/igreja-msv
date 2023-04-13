<?php

namespace App\Services;

use App\Helpers\Constants;

/**
 * Class EscalaFuncaoService
 * @package App\Services
 */
class EscalaFuncaoService extends AbstractService
{
    /**
     * @return string[]
     */
    public function list()
    {
        return Constants::FUNCOES_LISTA;
    }
}
