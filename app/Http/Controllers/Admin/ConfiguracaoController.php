<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfiguracaoRequest;
use App\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = $this->service->edit(Auth::id());
        return view('admin/configuracoes/edit')->with(['data' => $data]);
    }

    /**
     * @param ConfiguracaoRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
