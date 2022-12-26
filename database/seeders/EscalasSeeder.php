<?php

namespace Database\Seeders;

use App\Models\Escala;
use Illuminate\Database\Seeder;

class EscalasSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            //Limpeza Terça
            ['data' => '2022-07-05 16:00:00', 'evento_id' => 1],
            ['data' => '2022-07-12 16:00:00', 'evento_id' => 1],
            ['data' => '2022-07-19 16:00:00', 'evento_id' => 1],
            ['data' => '2022-07-26 16:00:00', 'evento_id' => 1],
            //Limpeza Quinta
            ['data' => '2022-07-07 16:00:00', 'evento_id' => 1],
            ['data' => '2022-07-14 16:00:00', 'evento_id' => 1],
            ['data' => '2022-07-21 16:00:00', 'evento_id' => 1],
            ['data' => '2022-07-28 16:00:00', 'evento_id' => 1],
            //Limpeza Sábado
            ['data' => '2022-07-02 09:00:00', 'evento_id' => 1],
            ['data' => '2022-07-09 09:00:00', 'evento_id' => 1],
            ['data' => '2022-07-16 09:00:00', 'evento_id' => 1],
            ['data' => '2022-07-23 09:00:00', 'evento_id' => 1],
            ['data' => '2022-07-30 09:00:00', 'evento_id' => 1],

            //Culto Público
            ['data' => '2022-07-07 19:00:00', 'evento_id' => 2],
            ['data' => '2022-07-10 19:00:00', 'evento_id' => 2],
            ['data' => '2022-07-17 19:00:00', 'evento_id' => 2],
            ['data' => '2022-07-24 19:00:00', 'evento_id' => 2],
            ['data' => '2022-07-31 19:00:00', 'evento_id' => 2],

            //Culto das mulheres
            ['data' => '2022-07-05 20:00:00', 'evento_id' => 3],
            ['data' => '2022-07-12 20:00:00', 'evento_id' => 3],
            ['data' => '2022-07-19 20:00:00', 'evento_id' => 3],
            ['data' => '2022-07-26 20:00:00', 'evento_id' => 3],
        ];

        foreach ($data as $key => $item) {
            $item['id'] = $key + 1;
            Escala::create($item);
        }
    }
}
