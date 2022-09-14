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
            'SE' => 'Segurança Externa',
            'DIR' => 'Direção EBD',
            'PHM' => 'Prof. Classe Homens',
            'PML' => 'Prof. Classe Mulheres',
            'PJV' => 'Prof. Classe Jovens',
            'PAD' => 'Prof. Classe Adolescentes',
            'PIN' => 'Prof. Classe Infantil',
            'PJR' => 'Prof. Classe Júnior',
            'PNM' => 'Prof. Classe Novos Membros',
            'PLO' => 'Prof. Classe Líderes e Obreiros',
            'PCA' => 'Prof. Classe Casais',
        );
    }
}
