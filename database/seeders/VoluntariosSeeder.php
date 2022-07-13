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
            ['id' => '1', 'nome' => 'Samuel Novais', 'funcao' => 'CG', 'escala_id' => 15],
            ['id' => '2', 'nome' => 'Francirley Rodrigues', 'funcao' => 'R', 'escala_id' => 15],
            ['id' => '3', 'nome' => 'Jefferson Alessandro', 'funcao' => 'A', 'escala_id' => 15],
            ['id' => '4', 'nome' => 'Fernando Soares', 'funcao' => 'H', 'escala_id' => 15],
        ];

        foreach ($data as $item) {
            Voluntario::create($item);
        }
    }
}
