<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitanteRequest;
use App\Mail\VisitanteEmail;
use App\Services\VisitanteService;
use Illuminate\Support\Facades\Mail;

/**
 * Class VisitanteController
 * @package App\Http\Controllers
 */
class VisitanteController extends Controller
{
    /**
     * @var VisitanteService
     */
    private $service;

    /**
     * @param VisitanteService $service
     */
    public function __construct(VisitanteService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('visitantes');
    }

    /**
     * @param VisitanteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VisitanteRequest $request)
    {
        $visitante = $this->service->store($request);

        Mail::to(['samucamj@gmail.com'])
            ->cc(['jeffersonassilva@gmail.com'])
            ->send(new VisitanteEmail($visitante));

        return $this->redirectWithMessage('visitantes.create', 'Visitante cadastrado com sucesso!');
    }
}
