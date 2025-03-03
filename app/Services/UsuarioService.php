<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $data = $this->model->find($id);
        $data->fill($request->all())->save();
        $data->roles()->sync($request->roles ?? []);

        return $data;
    }

    /**
     * Summary of resetPassword
     * @param mixed $request
     * @param mixed $id
     * @return User|User[]|\LaravelIdea\Helper\App\Models\_IH_User_C|null
     */
    public function resetPassword($request, $id) {
        $data = $this->model->find($id);
        $data->fill($request->all())->save();

        return $data;
    }
}
