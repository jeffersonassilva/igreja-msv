<?php

namespace App\Services\EBD;

use App\Models\EBD\Calendario;
use App\Services\AbstractService;
use Carbon\Carbon;

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
    public function store($request)
    {
        $data = $this->model->fill($request->all());
        $data->save();

        $id = $data->id;
        $arrayClasses = $request->get('classes');

        foreach ($arrayClasses as $classe) {
            $this->model->escalas()->create(
                [
                    'calendario' => $id,
                    'classe_id' => $classe
                ]
            );
        }

    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $data = $this->model->find($id);
        $data->fill($request->all())->save();

        $listaClasses = array();
        foreach ($request->classes as $key => $classe) {
            $listaClasses[$key]['calendario_id'] = $id;
            $listaClasses[$key]['classe_id'] = $classe;
        }

        $existingIds = $data->escalas()->pluck('classe_id')->toArray();
        $newIds = $request->classes;
        $toDelete = array_diff($existingIds, $newIds);
        $data->escalas()->where('calendario_id', $id)->whereIn('classe_id', $toDelete)->delete();

        foreach ($listaClasses as $escala) {
            $data->escalas()->updateOrCreate(
                ['classe_id' => $escala['classe_id'] ?? null], $escala
            );
        }

        return $data;
    }

    /**
     * @return mixed
     */
    public function aulasDinamicas()
    {
        $query = $this->model
            ->where('data', '>=', Carbon::now()->subHour(3)->format('Y-m-d H:i:s'))
            ->whereHas('escalas', function ($query) {
                return $query->where('permanente', '=', false);
            })
            ->orderBy('data');

        return $query->get();
    }
}
