<?php

namespace App\Services;

use App\Models\Voluntario;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Class VoluntarioService
 * @package App\Services
 */
class VoluntarioService extends AbstractService
{
    use UploadTrait;

    /**
     * @var Voluntario
     */
    protected $model;

    /**
     * @var string
     */
    private $diretorio;

    /**
     * VoluntarioService constructor.
     */
    public function __construct()
    {
        $this->model = new Voluntario();
        $this->diretorio = 'img/voluntarios/';
    }

    /**
     * @param array $where
     * @param array $orders
     * @return mixed
     */
    public function where(array $where = array(), array $orders = array())
    {
        $where = array_filter($where);

        if (isset($where['nome'])) {
            $where['nome'] = ['like', '%' . $where['nome'] . '%'];
        }

        return parent::where($where, $orders);
    }

    /**
     * @param $nome
     * @return mixed
     */
    public function firstOrCreate($nome)
    {
        return Voluntario::firstOrCreate(['nome' => $nome]);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $dados = $request->all();
        $dados = $this->definirNomeDaFotoDoVoluntario($request, $dados);

        DB::beginTransaction();
        $data = $this->model->find($id);
        $dadosAntigos = $data->toArray();

        try {
            $data->fill($dados)->save();
            DB::commit();
            $this->removerFotoAntigaVoluntario($dadosAntigos, $data->getChanges());

        } catch (ValidationException $e) {
            DB::rollback();
        }

        return $data;
    }
}
