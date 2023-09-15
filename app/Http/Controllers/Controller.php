<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $route
     * @param $mensagem
     * @param string $typeMessage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectWithMessage($route, $mensagem, string $typeMessage = 'success'): \Illuminate\Http\RedirectResponse
    {
        switch ($typeMessage) {
            case 'error':
                $color = '#ffb9b9';
                break;
            case 'warning':
                $color = '#fef19b';
                break;
            default:
                $color = '#bcf0da';
                break;
        }

        if (is_array($route)) {
            list($route, $id) = $route;
            return redirect()
                ->route($route, $id)
                ->with([
                    Constants::MESSAGE => $mensagem,
                    Constants::COLOR_TYPE_MESSAGE => $color
                ]);
        }

        return redirect()
            ->route($route)
            ->with([
                Constants::MESSAGE => $mensagem,
                Constants::COLOR_TYPE_MESSAGE => $color
            ]);
    }

    /**
     * @param $view
     * @param $data
     * @param $message
     * @param string $typeMessage
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewWithMessage($view, $data, $message = null, string $typeMessage = 'success')
    {
        switch ($typeMessage) {
            case 'error':
                $color = '#ffb9b9';
                break;
            case 'alert':
                $color = '#fef19b';
                break;
            default:
                $color = '#bcf0da';
                break;
        }

        if ($message) {
            request()->session()->flash(Constants::MESSAGE, $message);
            request()->session()->flash('colorTypeMessage', $color);
        }

        return view($view)->with($data);
    }

    /**
     * @param $action
     * @return void
     */
    public function checkPermission($action)
    {
        if (Gate::denies($action, User::class)) {
            abort(Constants::HTTP_FORBIDDEN, 'Sem permissão de acesso');
        }
    }
}
