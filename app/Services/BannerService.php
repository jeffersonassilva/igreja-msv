<?php

namespace App\Services;

use App\Models\Banner;
use App\Traits\UploadBannerTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Class BannerService
 * @package App\Services
 */
class BannerService extends AbstractService
{
    use UploadBannerTrait;

    /**
     * @var Banner
     */
    protected $model;

    /**
     * @var string
     */
    private $diretorio;

    /**
     * BannerService constructor.
     */
    public function __construct()
    {
        $this->model = new Banner();
        $this->diretorio = 'img/banner/';
    }

    /**
     * @param $request
     * @return bool
     */
    public function store($request)
    {
        $dados = $request->all();
        $dados = $this->setNameImagesIfExits($request, $dados);

        return $this->model->fill($dados)->save();
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $dados = $request->all();
        $dados = $this->setNameImagesIfExits($request, $dados);

        DB::beginTransaction();
        $data = $this->model->find($id);
        $dadosAntigos = $data->toArray();

        try {
            $data->fill($dados)->save();
            DB::commit();
            $this->removerImagensAntigas($dadosAntigos);

        } catch (ValidationException $e) {
            DB::rollback();
        }

        return $data;
    }
}
