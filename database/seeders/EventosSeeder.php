<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'descricao' => 'Limpeza do templo', 'situacao' => 1],
            ['id' => '2', 'descricao' => 'Culto público', 'situacao' => 1],
            ['id' => '3', 'descricao' => 'Culto das mulheres', 'situacao' => 1],
        ];

        foreach ($data as $item) {
            Evento::create($item);
        }
    }
}
