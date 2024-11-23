<?php

namespace App\Services;

use App\Models\EscalaVoluntario;
use App\Models\Funcao;

class FuncaoService extends AbstractService
{
    /**
     * @var Funcao
     */
    protected $model;

    /**
     * FuncaoService constructor.
     */
    public function __construct()
    {
        $this->model = new Funcao();
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $data = $this->model->find($id);
        $abreviacaoAntiga = $data->abreviacao;
        $abreviacaoAtual = $request->get('abreviacao');

        $data->fill($request->all());
        $data->save();

        EscalaVoluntario::where('funcao', $abreviacaoAntiga)
            ->update(['funcao' => $abreviacaoAtual]);

        return $data;
    }
}
