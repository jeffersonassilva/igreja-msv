<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Models\Escala;
use Carbon\Carbon;

/**
 * Class EscalaService
 * @package App\Services
 */
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
     * @param $filter
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list($filter = array())
    {
        $query = $this->model->with('voluntarios.voluntario')
            ->whereHas('evento', function ($query) {
                return $query->where('situacao', Constants::TRUE);
            });

        if (!isset($filter['fechada']) || $filter['fechada'] == 1) {
            $query->where('data', '>=', Carbon::now()->format('Y-m-d H:i'));
        }

        $query->orderBy('data');

        return $query->get();
    }
}
