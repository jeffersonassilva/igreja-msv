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

        return array(
            'img_mobile' => $this->diretorio . $this->uploadImgMobile($time, $request),
            'img_web' => $this->diretorio . $this->uploadImgWeb($time, $request)
        );
    }

    /**
     * @param $time
     * @param $request
     * @return false|string
     */
    private function uploadImgMobile($time, $request)
    {
        $extension = $request->file('img_mobile')->extension();
        $nomeImagem = $time . '.' . $extension;

        $name = Storage::disk('banners')->putFileAs('mobile', $request->file('img_mobile'), $nomeImagem);

        if (Storage::disk('banners')->exists($name)) {
            $this->redimensionarImagemMobile($this->diretorio . $name, $extension);
        }

        return $name;
    }

    /**
     * @param $fileName
     * @param $extension
     * @return void
     */
    private function redimensionarImagemMobile($fileName, $extension)
    {
        if ($extension == 'jpg' || $extension == 'jpeg') {
            $image = @imagecreatefromjpeg($fileName);
            $img = imagescale($image, 640, 360);
            imagejpeg($img, $fileName, 70);

        } elseif ($extension == 'png') {
            $image = @imagecreatefrompng($fileName);
            $img = imagescale($image, 640, 360);
            imagepng($img, $fileName, 70);

        } else {
            return;
        }

        imagedestroy($img);
    }

    /**
     * @param $time
     * @param $request
     * @return string
     */
    private function uploadImgWeb($time, $request)
    {
        $nomeImagem = $time . '.' . $request->file('img_web')->extension();

        return Storage::disk('banners')->putFileAs('web', $request->file('img_web'), $nomeImagem);
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
