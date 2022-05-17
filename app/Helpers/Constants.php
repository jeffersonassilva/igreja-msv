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
}
