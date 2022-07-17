<?php

namespace App\Services;

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
        return array(
            'CG' => 'Coordenador Geral',
            'R' => 'Recepção',
            'A' => 'Apoio',
            'H' => 'Higienização',
            'SI' => 'Segurança Interna',
            'SE' => 'Segurança Externa'
        );
    }
}
