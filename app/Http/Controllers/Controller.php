<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $route
     * @param $mensagem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectWithMessage($route, $mensagem): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($route)->with(Constants::MESSAGE, $mensagem);
    }
}
