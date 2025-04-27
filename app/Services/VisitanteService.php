<?php

namespace App\Services;

use App\Models\Visitante;
use Illuminate\Pagination\LengthAwarePaginator;

class VisitanteService extends AbstractService
{
    /**
     * @var Visitante
     */
    protected $model;

    /**
     * VisitanteService constructor.
     */
    public function __construct()
    {
        $this->model = new Visitante();
    }

    /**
     * @param mixed $request
     * @return Visitante
     */
    public function store($request)
    {
        $visitante = $this->model->fill($request->all());
        $visitante->save();
        $visitante->refresh();

        return $visitante;
    }

    /**
     * @param array $filter
     * @return LengthAwarePaginator|Visitante[]
     */
    public function list(array $filter)
    {
        $query = $this->model
            ->whereNull(['sem_sucesso', 'membro_ativo']);

        if (isset($filter['nome'])) {
            $query->where('nome', 'like', '%' . $filter['nome'] . '%');
        }

        if (isset($filter['sexo'])) {
            $query->where('sexo', '=', $filter['sexo']);
        }

        if (isset($filter['responsavel'])) {
            $query->whereNotNull('responsavel');
        }

        if (isset($filter['dt_visita_inicio']) && isset($filter['dt_visita_fim'])) {
            $query->whereBetween('dt_visita', [$filter['dt_visita_inicio'], $filter['dt_visita_fim']]);
        }

        if (isset($filter['oracao'])) {
            $query->where('oracao', '=', $filter['oracao']);
        }

        if (isset($filter['congregando'])) {
            $query->where('congregando', '=', $filter['congregando']);
        }

        if (isset($filter['deseja_batismo'])) {
            $query->where('deseja_batismo', '=', $filter['deseja_batismo']);
        }

        $query
            ->orderBy('created_at', 'desc');

        return $query->paginate();
    }
}
