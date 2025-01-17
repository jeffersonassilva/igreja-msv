<?php

namespace App\Helpers;

class Constants
{
    /**
     * HTTP CODES
     */
    const HTTP_FORBIDDEN = 403;

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
    const COLOR_TYPE_MESSAGE = 'colorTypeMessage';
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
     * LISTA DE COMPARECIMENTOS
     */
    const COMPARECIMENTO_LISTA = [
        'P' => 'Presente',
        'F' => 'Falta',
        'FJ' => 'Falta Justificada',
    ];

    /**
     * LISTA DE DIAS DA SEMANA
     */
    const DIAS_SEMANA_LISTA = [
        '1' => 'Domingo',
        '2' => 'Segunda',
        '3' => 'Terça',
        '4' => 'Quarta',
        '5' => 'Quinta',
        '6' => 'Sexta',
        '7' => 'Sábado',
    ];
}
