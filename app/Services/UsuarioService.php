<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsuarioService
 * @package App\Services
 */
class UsuarioService extends AbstractService
{
    /**
     * @var User
     */
    protected $model;

    /**
     * UsuarioService constructor.
     */
    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $password = Hash::make('Jm8Igr3j@M5V');
        $request->request->add(['password' => $password]);

        return parent::store($request);
    }
}
