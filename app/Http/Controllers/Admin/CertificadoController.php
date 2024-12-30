<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificadoRequest;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class CertificadoController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin/certificados/create');
    }

    /**
     * @param CertificadoRequest $request
     * @return Response|null
     */
    public function store(CertificadoRequest $request)
    {
        $titulo = $request['titulo'];
        $fraseInicial = $request['frase_inicial'];
        $nome = $request['nome'];
        $mensagem = $request['mensagem'];
        $cargoAssinatura = $request['cargo_assinatura'];
        $nomeAssinatura = $request['nome_assinatura'];

        $pdf = PDF::loadView('admin/certificados/certificado-pdf', compact(
            'titulo',
            'fraseInicial',
            'nome',
            'mensagem',
            'cargoAssinatura',
            'nomeAssinatura'
        ))->setPaper('a4', 'landscape');

        // Baixar o PDF com um nome de arquivo dinâmico
//        return $pdf->download('certificado_' . $nome . '.pdf');

        $filename = 'certificado_' . str_replace(' ', '_', strtolower($nome));

        return $pdf->stream(
            $filename . '.pdf'
        );
    }
}
