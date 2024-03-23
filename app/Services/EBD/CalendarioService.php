<?php

namespace App\Services\EBD;

use App\Models\EBD\Calendario;
use App\Services\AbstractService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CalendarioService
 * @package App\Services
 */
class CalendarioService extends AbstractService
{
    /**
     * @var Calendario
     */
    protected $model;

    /**
     * CalendarioService constructor.
     */
    public function __construct()
    {
        $this->model = new Calendario();
    }

    /**
     * @param $request
     * @return void
     */
    public function storeMany($request)
    {
        $arrayClasses = $request->get('classes');

        foreach ($arrayClasses as $item) {

            $this->model->updateOrCreate(
                [
                    'data' => $request->get('data'),
                    'tema' => $request->get('tema'),
                    'classe_id' => $item
                ]
            );
        }
    }

    /**
     * @param $filter
     * @return Builder[]|Collection
     */
    public function aulasDinamicas($filter = array())
    {
        $query = $this->model->with('classe.alunos')
            ->withAggregate('classe', 'nome');

        if (isset($filter['dt_escala'])) {
            $query->whereDate('data', '=', $filter['dt_escala']);
        } else {
            $query->where('data', '>=', Carbon::now()->subHour(3)->format('Y-m-d'));
        }

        $query->where('permanente', '=', false);
        $query->orderBy('data', 'asc');
        $query->orderBy('classe_nome', 'asc');

        return $query->get();
    }

    /**
     * @param $filter
     * @return Builder[]|Collection
     */
    public function aulasPermanentes($filter = array())
    {
        $query = $this->model->with('classe')
            ->withAggregate('classe', 'nome');

        $query->where('permanente', '=', true);
        $query->orderBy('data', 'asc');

        return $query->get();
    }
}
