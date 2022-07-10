<?php

namespace App\Services;

use App\Models\Evento;

/**
 * Class EventoService
 * @package App\Services
 */
class EventoService extends AbstractService
{
    /**
     * @var Evento
     */
    protected $model;

    /**
     * EventoService constructor.
     */
    public function __construct()
    {
        $this->model = new Evento();
    }
}
