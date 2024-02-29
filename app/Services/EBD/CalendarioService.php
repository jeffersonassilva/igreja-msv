<?php

namespace App\Services\EBD;

use App\Models\EBD\Calendario;
use App\Services\AbstractService;
use Carbon\Carbon;

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
     * @return mixed
     */
    public function list($filter = array())
    {
        $query = $this->model->withAggregate('classe', 'nome');

        if (isset($filter['dt_escala'])) {
            $query->whereDate('data', '=', $filter['dt_escala']);
        } else {
            $query->where('data', '>=', Carbon::now()->format('Y-m-d H:i'));
        }

        $query->orderBy('data', 'asc');
        $query->orderBy('classe_nome', 'asc');

        return $query->get();
    }
}
