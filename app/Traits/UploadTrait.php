<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    /**
     * @return false|string
     */
    public function getDataAtual()
    {
        return date('YmdHis');
    }

    /**
     * @param $request
     * @param $dados
     * @return mixed
     */
    public function setNameImagesIfExits($request, $dados)
    {
        if ($request->hasFile('img_mobile')) {
            $dados['img_mobile'] = $this->diretorio . $this->uploadImgMobile($this->getDataAtual(), $request);
        }

        if ($request->hasFile('img_web')) {
            $dados['img_web'] = $this->diretorio . $this->uploadImgWeb($this->getDataAtual(), $request);
        }

        return $dados;
    }

    /**
     * @param $request
     * @param $dados
     * @return mixed
     */
    public function definirNomeDaFotoDoVoluntario($request, $dados)
    {
        if ($request->hasFile('foto')) {
            $dados['foto'] = $this->diretorio . $this->uploadFotoVoluntario($request);
        }

        return $dados;
    }

    /**
     * @param $request
     * @param $dados
     * @return mixed
     */
    public function definirNomeDoArquivoNotaFiscal($request, $dados)
    {
        if ($request->hasFile('arquivo')) {
            $dados['arquivo'] = $this->diretorio . $this->uploadNotaFiscal($request);
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
     * @param $request
     * @return false|string
     */
    private function uploadFotoVoluntario($request)
    {
        $extension = $request->file('foto')->extension();
        $nomeImagem = $this->getDataAtual() . '.jpg';
        $name = Storage::disk('voluntarios')->putFileAs('', $request->file('foto'), $nomeImagem);

        if (Storage::disk('voluntarios')->exists($name)) {
            $this->optimizarImagem($this->diretorio . $name, $extension, 240, 240);
        }

        return $name;
    }

    /**
     * @param $request
     * @return false|string
     */
    private function uploadNotaFiscal($request)
    {
        $nomeImagem = $this->getDataAtual() . '.jpg';
        return Storage::disk('notas-fiscais')->putFileAs('', $request->file('arquivo'), $nomeImagem);
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
     * @param $alteracoes
     * @return void
     */
    private function removerImagensAntigas($data, $alteracoes)
    {
        if (isset($alteracoes['img_mobile'])) {
            Storage::disk('banners')->delete(str_replace($this->diretorio, '', $data['img_mobile']));
        }

        if (isset($alteracoes['img_web'])) {
            Storage::disk('banners')->delete(str_replace($this->diretorio, '', $data['img_web']));
        }
    }

    /**
     * @param $data
     * @param $alteracoes
     * @return void
     */
    private function removerFotoAntigaVoluntario($data, $alteracoes)
    {
        if (isset($alteracoes['foto'])) {
            Storage::disk('voluntarios')->delete(str_replace($this->diretorio, '', $data['foto']));
        }
    }
}
