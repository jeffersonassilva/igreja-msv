<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfiguracaoRequest;
use App\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ConfiguracaoController extends Controller
{
    /**
     * @var UsuarioService
     */
    private $service;

    /**
     * @param UsuarioService $service
     */
    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = $this->service->edit(Auth::id());
        return view('admin/configuracoes/edit')->with(['data' => $data]);
    }

    /**
     * @param ConfiguracaoRequest $request
     * @return RedirectResponse
     */
    public function update(ConfiguracaoRequest $request)
    {
        if ($request->get('current-password') && $request->get('new-password')) {
            $request->request->add(['password' => Hash::make($request->get('new-password'))]);
        }

        $this->service->update($request, Auth::id());
        return $this->redirectWithMessage('configuracoes', __(Constants::SUCCESS_UPDATE));
    }
}
