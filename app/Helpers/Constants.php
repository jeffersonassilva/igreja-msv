<?php

namespace App\Helpers;

class Constants
{
    /**
     * VALORES BOLEANOS
     */
    const TRUE = true;
    const FALSE = false;

    /**
     * SQL ORDER
     */
    const CRESCENTE = 'asc';
    const DECRESCENTE = 'desc';

    /**
     * FLASH MESSAGES
     */
    const MESSAGE = 'message';
    const SUCCESS_CREATE = 'responses.success.create';
    const SUCCESS_UPDATE = 'responses.success.update';
    const SUCCESS_DESTROY = 'responses.success.destroy';
    const SUCCESS_ARCHIVE = 'responses.success.archive';

    /**
     * CACHE KEYS
     */
    const CACHE_YOUTUBE_KEY = 'msv::youtube-last-video';
    const CACHE_LISTA_PROPOSITOS = 'msv::lista-propositos';
    const CACHE_LISTA_BANNERS = 'msv::lista-banners';
    const CACHE_LISTA_PASTORES = 'msv::lista-pastores';

    /**
     * LISTA DE FUNCÕES
     */
    const FUNCOES_LISTA = [
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
    ];

    /**
     * LISTA DE COMPARECIMENTOS
     */
    const COMPARECIMENTO_LISTA = [
        'P' => 'Presente',
        'F' => 'Falta',
        'FJ' => 'Falta Justificada',
    ];
}
