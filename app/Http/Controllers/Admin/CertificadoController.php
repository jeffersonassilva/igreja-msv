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
        $nome = $request['nome'];
        $mensagem = $request['mensagem'];
        $cargo_assinatura = $request['cargo_assinatura'];
        $nome_assinatura = $request['nome_assinatura'];

        $pdf = PDF::loadView('admin/certificados/certificado-pdf', compact(
            'titulo',
            'nome',
            'mensagem',
            'cargo_assinatura',
            'nome_assinatura'
        ))->setPaper('a4', 'landscape');

        // Baixar o PDF com um nome de arquivo dinâmico
//        return $pdf->download('certificado_' . $nome . '.pdf');

        $filename = 'certificado_' . str_replace(' ', '_', strtolower($nome));

        return $pdf->stream(
            $filename . '.pdf'
        );
    }
}
