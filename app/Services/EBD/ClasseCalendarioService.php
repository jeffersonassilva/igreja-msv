<?php

namespace App\Services\EBD;

use App\Models\EBD\ClasseCalendario;
use App\Services\AbstractService;

/**
 * Class ClasseCalendarioService
 * @package App\Services
 */
class ClasseCalendarioService extends AbstractService
{
    /**
     * @var ClasseCalendario
     */
    protected $model;

    /**
     * ClasseCalendarioService constructor.
     */
    public function __construct()
    {
        $this->model = new ClasseCalendario();
    }

    /**
     * @param $request
     * @return void
     */
    public function storeMany($request)
    {
        $arrayClasses = $request->get('classes');

        foreach ($arrayClasses as $item) {

            $this->model->updateOrCreate(
                [
                    'data' => $request->get('data'),
                    'classe_id' => $item
                ]
            );
        }
    }
}
