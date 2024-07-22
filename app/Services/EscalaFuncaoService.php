<?php

namespace App\Services;

use App\Helpers\Constants;

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
