<?php

namespace Database\Seeders;

use App\Models\Voluntario;
use Illuminate\Database\Seeder;

class VoluntariosSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'nome' => 'Samuel Novais', 'sexo' => 'M'],
            ['id' => '2', 'nome' => 'Francirley Rodrigues', 'sexo' => 'M'],
            ['id' => '3', 'nome' => 'Jefferson Alessandro', 'sexo' => 'M'],
            ['id' => '4', 'nome' => 'Fernando Soares', 'sexo' => 'M'],
        ];

        foreach ($data as $item) {
            Voluntario::create($item);
        }
    }
}
