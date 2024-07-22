<?php

namespace App\Services\EBD;

use App\Models\EBD\Classe;
use App\Services\AbstractService;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ClasseService extends AbstractService
{
    use UploadTrait;

    /**
     * @var Classe
     */
    protected $model;

    /**
     * @var string
     */
    private $diretorio;

    /**
     * ClasseService constructor.
     */
    public function __construct()
    {
        $this->model = new Classe();
        $this->diretorio = 'img/ebd/revistas/';
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $dados = $request->all();
        $dados = $this->definirNomeDaImagemRevista($request, $dados);

        DB::beginTransaction();
        $data = $this->model->find($id);
        $dadosAntigos = $data->toArray();

        try {
            $data->fill($dados)->save();
            DB::commit();
            $this->removerFotoAntigaRevista($dadosAntigos, $data->getChanges());

        } catch (ValidationException $e) {
            DB::rollback();
        }

        return $data;
    }
}
