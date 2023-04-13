<?php

namespace App\Services;

use App\Models\Disponibilidade;
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
     * @return Voluntario
     */
    public function store($request)
    {
        $this->model->fill($request->all())->save();
        foreach ($request->disponibilidades as $disponibilidade) {
            $this->model->disponibilidades()->save(new Disponibilidade([
                'dia' => $disponibilidade,
            ]));
        }
        return $this->model;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function edit($id)
    {
        return $this->model->with('disponibilidades')->find($id);
    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function update($request, $id)
    {
        $dados = $request->all();
        $dados = $this->definirNomeDaFotoDoVoluntario($request, $dados);

        DB::beginTransaction();
        $data = $this->model->with('disponibilidades')->find($id);
        $dadosAntigos = $data->toArray();

        try {
            $data->fill($dados)->save();
            $this->atualizarDisponibilidades($request, $data);
            DB::commit();
            $this->removerFotoAntigaVoluntario($dadosAntigos, $data->getChanges());

        } catch (ValidationException $e) {
            DB::rollback();
        }

        return $data;
    }

    /**
     * @param $request
     * @param $voluntario
     * @return void
     */
    public function atualizarDisponibilidades($request, $voluntario)
    {
        if ($this->houveMundancaNaDisponibilidade($voluntario['disponibilidades'], $request->disponibilidades)) {
            $voluntario->disponibilidades()->forceDelete();

            foreach ($request->disponibilidades as $disponibilidade) {
                $voluntario->disponibilidades()->save(new Disponibilidade([
                    'dia' => $disponibilidade,
                ]));
            }
        }
    }

    /**
     * @param $dadosAntigos
     * @param $dadosAtuais
     * @return bool
     */
    public function houveMundancaNaDisponibilidade($dadosAntigos, $dadosAtuais)
    {
        $dadosModificados = array();

        foreach ($dadosAntigos as $item) {
            $dadosModificados[] = (string)$item['dia'];
        }

        return array_diff($dadosAtuais, $dadosModificados) !== array_diff($dadosModificados, $dadosAtuais);
    }
}
