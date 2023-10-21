<?php

namespace App\Services;

use App\Models\NotaFiscal;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

/**
 * Class NotaFiscalService
 * @package App\Services
 */
class NotaFiscalService extends AbstractService
{
    use UploadTrait;

    /**
     * @var NotaFiscal
     */
    protected $model;

    /**
     * NotaFiscalService constructor.
     */
    public function __construct()
    {
        $this->model = new NotaFiscal();
        $this->diretorio = 'img/notas-fiscais/';
    }

    /**
     * @param $where
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function relatorioNotasPorCartao($where)
    {
        $query = $this->model;

        if (isset($where['mes']) && !empty($where['mes'])) {
            $query = $query->whereRaw('month(data) = ' . $where['mes']);
        }

        if (isset($where['ano']) && !empty($where['ano'])) {
            $query = $query->whereRaw('year(data) = ' . $where['ano']);
        }

        return $query->with(['cartao']);
    }

    /**
     * @param $request
     * @return NotaFiscal|mixed
     */
    public function store($request)
    {
        $dados = $request->all();
        $dados = $this->definirNomeDoArquivoNotaFiscal($request, $dados);

        $nota = $this->model->fill($dados);
        $nota->save();
        $nota->refresh();

        return $nota;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function archive($id)
    {
        $data = $this->model->find($id);
        $data->fill(['verificada' => true])->save();
        $this->deletarArquivoNotaFiscal($data->arquivo);

        return $data;
    }

    /**
     * @param $arquivo
     * @return void
     */
    private function deletarArquivoNotaFiscal($arquivo)
    {
        $arquivo = str_replace('img/notas-fiscais/', '', $arquivo);

        if (Storage::disk('notas-fiscais')->exists($arquivo)) {
            Storage::disk('notas-fiscais')->delete($arquivo);
        }
    }
}
