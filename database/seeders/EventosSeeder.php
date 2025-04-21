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
            ['id' => '1', 'descricao' => 'Limpeza do Templo', 'situacao' => '1', 'cor' => '#ff8537', 'qntd_voluntarios' => '1'],
            ['id' => '2', 'descricao' => 'Culto Público', 'situacao' => '1', 'cor' => '#00d5ff', 'qntd_voluntarios' => '7'],
            ['id' => '3', 'descricao' => 'Culto de Mulheres', 'situacao' => '1', 'cor' => '#e969ff', 'qntd_voluntarios' => '3'],
            ['id' => '4', 'descricao' => 'Culto de Imersão', 'situacao' => '1', 'cor' => '#355bf0', 'qntd_voluntarios' => '5'],
            ['id' => '5', 'descricao' => 'Escola Bíblica Dominical', 'situacao' => '1', 'cor' => '#53c98a', 'qntd_voluntarios' => '2'],
            ['id' => '6', 'descricao' => 'Mutirão', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '7', 'descricao' => 'Santa Ceia (Mesa Ministração)', 'situacao' => '1', 'cor' => '#c9b73b', 'qntd_voluntarios' => '10'],
            ['id' => '8', 'descricao' => 'Seminário de Casais', 'situacao' => '1', 'cor' => '#ed143d', 'qntd_voluntarios' => '5'],
            ['id' => '9', 'descricao' => 'Conferência de Louvor', 'situacao' => '1', 'cor' => '#5d33a4', 'qntd_voluntarios' => '6'],
            ['id' => '10', 'descricao' => 'Professor EBD', 'situacao' => '1', 'cor' => '#92400e', 'qntd_voluntarios' => NULL],
            ['id' => '11', 'descricao' => 'Conexão Jovem', 'situacao' => '1', 'cor' => '#5d33a4', 'qntd_voluntarios' => '8'],
            ['id' => '12', 'descricao' => 'Conferência KIDS', 'situacao' => '1', 'cor' => '#5d33a4', 'qntd_voluntarios' => '6'],
            ['id' => '13', 'descricao' => 'GCE', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '14', 'descricao' => 'Retiro Familiar', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '15', 'descricao' => 'Conferência Festa da Igreja', 'situacao' => '1', 'cor' => '#946065', 'qntd_voluntarios' => '7'],
            ['id' => '16', 'descricao' => 'Assembleia Geral', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '17', 'descricao' => 'Reunião', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '18', 'descricao' => 'Jantar de Confraternização', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '19', 'descricao' => 'Culto Natalino', 'situacao' => '0', 'cor' => NULL, 'qntd_voluntarios' => '5'],
            ['id' => '20', 'descricao' => 'Culto da Virada', 'situacao' => '0', 'cor' => '#00d5ff', 'qntd_voluntarios' => '5'],
            ['id' => '21', 'descricao' => 'Confraternização MSV', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '7'],
            ['id' => '22', 'descricao' => 'Oração no Templo', 'situacao' => '0', 'cor' => NULL, 'qntd_voluntarios' => '2'],
            ['id' => '23', 'descricao' => 'Culto dos Homens', 'situacao' => '1', 'cor' => '#05799d', 'qntd_voluntarios' => '3'],
            ['id' => '24', 'descricao' => 'Congresso (08h às 10h)', 'situacao' => '0', 'cor' => NULL, 'qntd_voluntarios' => '6'],
            ['id' => '25', 'descricao' => 'Congresso (10h às 12h)', 'situacao' => '0', 'cor' => NULL, 'qntd_voluntarios' => '5'],
            ['id' => '26', 'descricao' => 'Culto de Jovens', 'situacao' => '1', 'cor' => '#00d5ff', 'qntd_voluntarios' => '6'],
            ['id' => '27', 'descricao' => 'Acampamento da Família', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '7'],
            ['id' => '28', 'descricao' => 'Conferência de Mulheres', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '10'],
            ['id' => '29', 'descricao' => 'Escola Bíblica de Férias', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '3'],
            ['id' => '30', 'descricao' => 'Conferência de Casais', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '6'],
            ['id' => '31', 'descricao' => 'Culto KIDS', 'situacao' => '1', 'cor' => '#b37fd0', 'qntd_voluntarios' => '5'],
            ['id' => '32', 'descricao' => 'Café Acolhimento', 'situacao' => '1', 'cor' => '#764545', 'qntd_voluntarios' => NULL],
            ['id' => '33', 'descricao' => 'Café com Pastor', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '34', 'descricao' => 'Culto de Ação de Graças', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '7'],
            ['id' => '36', 'descricao' => 'Seminário da Família', 'situacao' => '1', 'cor' => '#770099', 'qntd_voluntarios' => '4'],
            ['id' => '37', 'descricao' => 'Jantar dos Namorados', 'situacao' => '1', 'cor' => '#d50826', 'qntd_voluntarios' => '4'],
            ['id' => '38', 'descricao' => 'Mulher Única', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '5'],
            ['id' => '39', 'descricao' => 'Consagração', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '3'],
            ['id' => '40', 'descricao' => 'Oração na quarta vigília', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '41', 'descricao' => 'Oração Pré Culto', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '42', 'descricao' => 'Conferência Jovens', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '43', 'descricao' => 'Palestra Casais', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '44', 'descricao' => 'Encontro de Casais MSV', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '45', 'descricao' => 'Festa da Igreja', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '46', 'descricao' => 'Conferência de Homens', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '6'],
            ['id' => '47', 'descricao' => 'Recepção Pastoral', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '48', 'descricao' => 'Projetando 2025', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '49', 'descricao' => 'Confraternização de Mulheres', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '50', 'descricao' => 'Culto da Virada', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '51', 'descricao' => 'Culto da Vitória', 'situacao' => '1', 'cor' => '#355bf0', 'qntd_voluntarios' => NULL],
            ['id' => '52', 'descricao' => 'Santa Ceia (Escala de Portaria)', 'situacao' => '1', 'cor' => '#c9b73b', 'qntd_voluntarios' => '7'],
            ['id' => '53', 'descricao' => 'Mini Vígilia de Oração', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => NULL],
            ['id' => '54', 'descricao' => '*Limpeza do Templo Check-up*', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '1'],
            ['id' => '55', 'descricao' => 'Culto de Casais', 'situacao' => '1', 'cor' => NULL, 'qntd_voluntarios' => '2']
        ];

        foreach ($data as $item) {
            Evento::create($item);
        }
    }
}
