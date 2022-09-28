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

        if (isset($filter['evento_id'])) {
            $query->where('evento_id', $filter['evento_id']);
        }

        if (isset($filter['periodo'])) {
            switch ($filter['periodo']) {
                case 'manha':
                    $query->whereTime('data', '>=', Carbon::parse('06:00'))
                        ->whereTime('data', '<=', Carbon::parse('11:59'));
                    break;
                case 'tarde':
                    $query->whereTime('data', '>=', Carbon::parse('12:00'))
                        ->whereTime('data', '<=', Carbon::parse('17:59'));
                    break;
                case 'noite':
                    $query->whereTime('data', '>=', Carbon::parse('18:00'))
                        ->whereTime('data', '<=', Carbon::parse('23:59'));
                    break;
            }
        }

        if (isset($filter['fechada'])) {
            $query->where('fechada', $filter['fechada']);
        }

        if (isset($filter['mes'])) {
            $query->whereMonth('data', '=', $filter['mes']);
        }

        if (isset($filter['dt_escala'])) {
            $query->whereDate('data', '=', $filter['dt_escala']);
        } else {
            $query->where('data', '>=', Carbon::now()->format('Y-m-d H:i'));
        }

        $query->orderBy('data');

        return $query->get();
    }
}
