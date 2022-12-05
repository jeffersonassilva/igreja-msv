<?php

namespace App\Services;

use App\Models\EscalaVoluntario;

/**
 * Class EscalaVoluntarioService
 * @package App\Services
 */
class EscalaVoluntarioService extends AbstractService
{
    /**
     * @var EscalaVoluntario
     */
    protected $model;

    /**
     * EscalaVoluntarioService constructor.
     */
    public function __construct()
    {
        $this->model = new EscalaVoluntario();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function listaEscalasPorVoluntarioId($id)
    {
        return EscalaVoluntario::where('voluntario_id', $id)
            ->join('escalas', 'escala_id', '=', 'escalas.id')
            ->join('eventos', 'escalas.evento_id', '=', 'eventos.id')
            ->orderByRaw('escalas.data desc')
            ->paginate(15);
    }
}
