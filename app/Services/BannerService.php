<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class BannerService
 * @package App\Services
 */
class BannerService extends AbstractService
{
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

    /**
     * @param $data
     * @return void
     */
    private function removerImagensAntigas($data)
    {
        Storage::disk('banners')->delete(str_replace($this->diretorio, '', $data['img_mobile']));
        Storage::disk('banners')->delete(str_replace($this->diretorio, '', $data['img_web']));
    }

    /**
     * @param $request
     * @param $dados
     * @return mixed
     */
    public function setNameImagesIfExits($request, $dados)
    {
        $time = date('YmdHis');
        $dados['img_mobile'] = null;
        $dados['img_web'] = null;

        if ($request->hasFile('img_mobile')) {
            $dados['img_mobile'] = $this->diretorio . $this->uploadImgMobile($time, $request);
        }

        if ($request->hasFile('img_web')) {
            $dados['img_web'] = $this->diretorio . $this->uploadImgWeb($time, $request);
        }

        return $dados;
    }

    /**
     * @param $time
     * @param $request
     * @return false|string
     */
    private function uploadImgMobile($time, $request)
    {
        $extension = $request->file('img_mobile')->extension();
        $nomeImagem = $time . '.jpg';

        Storage::disk('banners')->putFileAs('original', $request->file('img_mobile'), $time . '_m.' . $extension);
        $name = Storage::disk('banners')->putFileAs('mobile', $request->file('img_mobile'), $nomeImagem);

        if (Storage::disk('banners')->exists($name)) {
            $this->optimizarImagem($this->diretorio . $name, $extension, 640, 360);
        }

        return $name;
    }

    /**
     * @param $time
     * @param $request
     * @return false|string
     */
    private function uploadImgWeb($time, $request)
    {
        $extension = $request->file('img_web')->extension();
        $nomeImagem = $time . '.jpg';

        Storage::disk('banners')->putFileAs('original', $request->file('img_web'), $time . '_w.' . $extension);
        $name = Storage::disk('banners')->putFileAs('web', $request->file('img_web'), $nomeImagem);

        if (Storage::disk('banners')->exists($name)) {
            $this->optimizarImagem($this->diretorio . $name, $extension, 1920, 400);
        }

        return $name;
    }

    /**
     * @param $fileName
     * @param $extension
     * @param $width
     * @param $height
     * @return void
     */
    private function optimizarImagem($fileName, $extension, $width, $height)
    {
        if ($extension == 'jpg' || $extension == 'jpeg') {
            $image = @imagecreatefromjpeg($fileName);
            $img = imagescale($image, $width, $height);
            imagejpeg($img, $fileName);

        } elseif ($extension == 'png') {
            $image = @imagecreatefrompng($fileName);
            $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
            imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
            imagealphablending($bg, true);
            imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));

            $img = imagescale($bg, $width, $height);

            imagedestroy($bg);
            imagejpeg($img, $fileName);

        } else {
            return;
        }

        imagedestroy($image);
        imagedestroy($img);
    }
}
