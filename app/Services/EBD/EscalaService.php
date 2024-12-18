<?php

namespace App\Services\EBD;

use App\Models\EBD\Escala;
use App\Services\AbstractService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EscalaService extends AbstractService
{
    /**
     * @var Escala
     */
    protected $model;

    /**
     * EscalaService constructor.
     */
    public function __construct()
    {
        $this->model = new Escala();
    }

    /**
     * @return Builder[]|Collection
     */
    public function aulasPermanentes()
    {
        $query = $this->model->with('classe')
            ->withAggregate('classe', 'nome')
            ->where('permanente', '=', true);

        return $query->get();
    }

    /**
     * @param $id
     * @return Builder|Model|object|null
     */
    public function alunos($id)
    {
        return $this->model
            ->with('classe.alunos')
            ->where('id', '=', $id)
            ->first();
    }
}
