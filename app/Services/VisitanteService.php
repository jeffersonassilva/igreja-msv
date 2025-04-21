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
     * @param $request
     * @return Visitante|mixed
     */
    public function store($request)
    {
        $visitante = $this->model->fill($request->all());
        $visitante->save();
        $visitante->refresh();

        return $visitante;
    }

    /**
     * @param $filter array
     * @return array|LengthAwarePaginator
     */
    public function list(array $filter): array|LengthAwarePaginator
    {
        $query = $this->model
            ->whereNull(['sem_sucesso', 'membro_ativo']);

        if (isset($filter['nome'])) {
            $query->where('nome', 'like', '%' . $filter['nome'] . '%');
        }

        if (isset($filter['responsavel'])) {
            $query->whereNotNull('responsavel');
        }

        if (isset($filter['dt_visita'])) {
            $query->whereDate('dt_visita', '=', $filter['dt_visita']);
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
            ->orderBy('dt_visita', 'desc')
            ->orderBy('responsavel', 'asc');

        return $query->paginate();
    }
}
