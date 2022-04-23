<?php

namespace Database\Seeders;

use App\Models\Proposito;
use Illuminate\Database\Seeder;

class PropositosSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'titulo' => 'Missão', 'descricao' => 'A Igreja Evangélica Ministério Semeando a Verdade tem como missão prestar assistência religiosa, congregar seus membros para adoração a Deus, estudar a Bíblia, expandir o evangelho do nosso Senhor Jesus Cristo.'],
            ['id' => '2', 'titulo' => 'Nossa Visão', 'descricao' => 'Ser uma igreja relevante baseada na multiplicação intencional e fundamentada na grande comissão (chamar, acolher e aperfeiçoar). Através de relacionamentos discipuladores ganhar almas para Jesus em nossa cidade e até os confins da terra. Lutar pela unidade da igreja como corpo de Cristo e expandir o reino de Deus nos lares.'],
            ['id' => '3', 'titulo' => 'Propósitos', 'descricao' => 'O propósito maior da Igreja MSV é fazer com que o evangelho do Senhor Jesus Cristo seja proclamado, anunciado, publicado, declarado e propagado em toda sua magnificente plenitude, a fim de que as vidas que lhe deem ouvidos sejam abençoadas e salvas.'],
        ];

        foreach ($data as $item) {
            Proposito::create($item);
        }
    }
}
