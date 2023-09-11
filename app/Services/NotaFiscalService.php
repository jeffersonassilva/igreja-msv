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
     * @param $request
     * @return NotaFiscal|mixed
     */
    public function store($request)
    {
        $dados = $request->all();
        $dados = $this->definirNomeDoArquivoNotaFiscal($request, $dados);

        $nota = $this->model->fill($dados);
        $nota->save();

        return $nota;
    }

    /**
     * @param $request
     * @param $dados
     * @return mixed
     */
    public function setImageNameIfExists($request, $dados)
    {
        $time = date('YmdHis');

        if ($request->hasFile('arquivo')) {
            $dados['arquivo'] = 'img/banner/' . $this->upload($time, $request);
        }

        return $dados;
    }

    /**
     * @param $time
     * @param $request
     * @return false|string
     */
    private function upload($time, $request)
    {
        $extension = $request->file('arquivo')->extension();
        $nomeImagem = $time . '.jpg';

        Storage::disk('banners')->putFileAs('original', $request->file('arquivo'), $time . '_m.' . $extension);
        $name = Storage::disk('banners')->putFileAs('mobile', $request->file('arquivo'), $nomeImagem);

        if (Storage::disk('banners')->exists($name)) {
            $this->optimizarImagem($this->diretorio . $name, $extension, 640, 360);
        }

        return $name;
    }
}
