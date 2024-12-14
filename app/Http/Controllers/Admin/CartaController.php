<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartaRequest;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class CartaController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin/cartas/create');
    }

    /**
     * @param CartaRequest $request
     * @return Response|null
     */
    public function store(CartaRequest $request)
    {
        $titulo = $request['titulo'];
        $nome = $request['nome'];
        $cargo = $request['cargo'];
        $cargo_assinatura1 = $request['cargo_assinatura1'];
        $nome_assinatura1 = $request['nome_assinatura1'];
        $cargo_assinatura2 = $request['cargo_assinatura2'];
        $nome_assinatura2 = $request['nome_assinatura2'];

        $pdf = PDF::loadView('admin/cartas/carta-pdf', compact(
            'titulo',
            'nome',
            'cargo',
            'cargo_assinatura1',
            'nome_assinatura1',
            'cargo_assinatura2',
            'nome_assinatura2'
        ))->setPaper('a4');

        // Baixar o PDF com um nome de arquivo dinâmico
//        return $pdf->download('certificado_' . $nome . '.pdf');

        $filename = 'carta_' . str_replace(' ', '_', strtolower($nome));

        return $pdf->stream(
            $filename . '.pdf'
        );
    }
}
