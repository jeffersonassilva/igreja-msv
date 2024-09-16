<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('certificado/index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos campos recebidos
//        $validated = $request->validate([
//            'nome' => 'required|string|max:255',
//            'texto' => 'required|string|max:1000',
//        ]);

        $titulo = $request['titulo'];
        $nome = $request['nome'];
        $mensagem = $request['mensagem'];
        $assinatura = $request['assinatura'];

        $pdf = PDF::loadView('certificado/certificado', compact('titulo', 'nome', 'mensagem', 'assinatura'))
            ->setPaper('a4', 'landscape');

        // Baixar o PDF com um nome de arquivo dinâmico
//        return $pdf->download('certificado_' . $nome . '.pdf');

        return $pdf->stream(
            'certificado_' . $nome . '.pdf'
        );
    }
}
