<?php

namespace Database\Seeders;

use App\Models\Pastor;
use Illuminate\Database\Seeder;

class PastorSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'titulo' => 'SAMUEL e HACSA NOVAIS', 'descricao' => 'O Ministério Semeando a Verdade foi um projeto que Deus colocou em nossos corações. Cremos que o Senhor nos deu entendimento a respeito dos nossos ministérios, e nos direcionou para realizar aquilo que nos foi confiado.'],
        ];

        foreach ($data as $item) {
            Pastor::create($item);
        }
    }
}
