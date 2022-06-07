<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PropositoService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @var PropositoService
     */
    private $service;

    /**
     * IndexController constructor.
     * @param PropositoService $service
     */
    public function __construct(PropositoService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $propositos = $this->service->all();

        return view('admin/index')->with(['propositos' => $propositos]);
    }
}
