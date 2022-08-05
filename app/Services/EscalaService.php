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
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return $this->model->with('evento')
            ->with('vonluntarios')
            ->where('situacao', Constants::TRUE)
            ->where('data', '>=', Carbon::now()->format('Y-m-d'))
            ->orderBy('data')
            ->get();
    }
}