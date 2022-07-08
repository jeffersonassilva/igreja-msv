<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Http\Requests\TestemunhoRequest;
use App\Services\TestemunhoService;

/**
 * Class TestemunhoController
 * @package App\Http\Controllers
 */
class TestemunhoController extends Controller
{
    /**
     * @var TestemunhoService
     */
    private $service;

    /**
     * BannerController constructor.
     * @param TestemunhoService $service
     */
    public function __construct(TestemunhoService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = $this->service->where(['situacao' => Constants::TRUE], ['created_at' => Constants::DECRESCENTE])->paginate();
        return view('testemunhos')->with('testemunhos', $data);
    }

    /**
     * @param TestemunhoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TestemunhoRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('testemunhos')->with('nome', $request->get('nome'));
    }
}
