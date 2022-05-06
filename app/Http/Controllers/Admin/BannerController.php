<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\BannerService;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * @var BannerService
     */
    private $service;

    /**
     * @var string
     */
    private $diretorio;

    /**
     * BannerController constructor.
     * @param BannerService $service
     */
    public function __construct(BannerService $service)
    {
        $this->service = $service;
        $this->diretorio = 'img/banner/';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data = $this->service->edit($id);

        return view('admin/banners/edit')->with(['data' => $data]);
    }

    /**
     * @param BannerRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BannerRequest $request, $id)
    {
        $dataRequest = $request->all();
        $urlImagens = $this->uploadImagens($request);
        $dados = array_merge($dataRequest, $urlImagens);

        $data = $this->service->edit($id);
        $this->removerImagensAntigas($data);

        $data->fill($dados)->save();

        return redirect()->route('dashboard');
    }

    /**
     * @param $request
     * @return array
     */
    private function uploadImagens($request)
    {
        $time = date('YmdHis');
        $this->uploadImgOriginal($time, $request);

        return array(
            'img_mobile' => $this->diretorio . $this->uploadImgMobile($time, $request),
            'img_web' => $this->diretorio . $this->uploadImgWeb($time, $request)
        );
    }

    /**
     * @param $time
     * @param $request
     * @return void
     */
    private function uploadImgOriginal($time, $request)
    {
        $nomeImagem = $time . '_m.' . $request->file('img_mobile')->extension();
        Storage::disk('banners')->putFileAs('original', $request->file('img_mobile'), $nomeImagem);

        $nomeImagem = $time . '_w.' . $request->file('img_web')->extension();
        Storage::disk('banners')->putFileAs('original', $request->file('img_web'), $nomeImagem);
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

        $name = Storage::disk('banners')->putFileAs('mobile', $request->file('img_mobile'), $nomeImagem);

        if (Storage::disk('banners')->exists($name)) {
            $this->optimizarImagem($this->diretorio . $name, $extension, 640, 360);
        }

        return $name;
    }

    /**
     * @param $time
     * @param $request
     * @return string
     */
    private function uploadImgWeb($time, $request)
    {
        $extension = $request->file('img_web')->extension();
        $nomeImagem = $time . '.jpg';

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

    /**
     * @param $data
     * @return void
     */
    private function removerImagensAntigas($data)
    {
        Storage::disk('banners')->delete(str_replace($this->diretorio, '', $data->img_mobile));
        Storage::disk('banners')->delete(str_replace($this->diretorio, '', $data->img_web));
    }
}
