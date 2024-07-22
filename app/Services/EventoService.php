<?php

namespace App\Services;

use App\Models\Evento;

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
