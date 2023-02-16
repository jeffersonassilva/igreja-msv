<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'nome' => 'adm-menu-usuario', 'descricao' => 'Menu Usuários'],
            ['id' => '2', 'nome' => 'adm-listar-usuario', 'descricao' => 'Listar Usuários'],
            ['id' => '3', 'nome' => 'adm-adicionar-usuario', 'descricao' => 'Adicionar Usuário'],
            ['id' => '4', 'nome' => 'adm-editar-usuario', 'descricao' => 'Editar Usuário'],
            ['id' => '5', 'nome' => 'adm-excluir-usuario', 'descricao' => 'Excluir Usuário'],
            ['id' => '6', 'nome' => 'adm-menu-perfil', 'descricao' => 'Menu Perfis'],
            ['id' => '7', 'nome' => 'adm-listar-perfil', 'descricao' => 'Listar Perfis'],
            ['id' => '8', 'nome' => 'adm-adicionar-perfil', 'descricao' => 'Adicionar Perfil'],
            ['id' => '9', 'nome' => 'adm-editar-perfil', 'descricao' => 'Editar Perfil'],
            ['id' => '10', 'nome' => 'adm-excluir-perfil', 'descricao' => 'Excluir Perfil'],
            ['id' => '11', 'nome' => 'adm-menu-testemunho', 'descricao' => 'Menu Testemunhos'],
            ['id' => '12', 'nome' => 'adm-listar-testemunho', 'descricao' => 'Listar Testemunhos'],
            ['id' => '13', 'nome' => 'adm-editar-testemunho', 'descricao' => 'Editar Testemunho'],
            ['id' => '14', 'nome' => 'adm-ativar-testemunho', 'descricao' => 'Ativar Testemunho'],
            ['id' => '15', 'nome' => 'adm-desativar-testemunho', 'descricao' => 'Desativar Testemunho'],
            ['id' => '16', 'nome' => 'adm-adicionar-banner', 'descricao' => 'Adicionar Banner'],
            ['id' => '17', 'nome' => 'adm-editar-banner', 'descricao' => 'Editar Banner'],
            ['id' => '18', 'nome' => 'adm-excluir-banner', 'descricao' => 'Excluir Banner'],
            ['id' => '19', 'nome' => 'adm-editar-proposito', 'descricao' => 'Editar Propósito'],
            ['id' => '20', 'nome' => 'adm-editar-pastor', 'descricao' => 'Editar Pastor'],
            ['id' => '21', 'nome' => 'adm-menu-evento', 'descricao' => 'Menu Eventos'],
            ['id' => '22', 'nome' => 'adm-listar-evento', 'descricao' => 'Listar Eventos'],
            ['id' => '23', 'nome' => 'adm-adicionar-evento', 'descricao' => 'Adicionar Evento'],
            ['id' => '24', 'nome' => 'adm-editar-evento', 'descricao' => 'Editar Evento'],
            ['id' => '25', 'nome' => 'adm-excluir-evento', 'descricao' => 'Excluir Evento'],
            ['id' => '26', 'nome' => 'adm-menu-escala', 'descricao' => 'Menu Escalas'],
            ['id' => '27', 'nome' => 'adm-listar-escala', 'descricao' => 'Listar Escalas'],
            ['id' => '28', 'nome' => 'adm-adicionar-escala', 'descricao' => 'Adicionar Escala'],
            ['id' => '29', 'nome' => 'adm-editar-escala', 'descricao' => 'Editar Escala'],
            ['id' => '30', 'nome' => 'adm-excluir-escala', 'descricao' => 'Excluir Escala'],
            ['id' => '31', 'nome' => 'adm-menu-voluntario', 'descricao' => 'Menu Voluntários'],
            ['id' => '32', 'nome' => 'adm-listar-voluntario', 'descricao' => 'Listar Voluntários'],
            ['id' => '33', 'nome' => 'adm-adicionar-voluntario', 'descricao' => 'Adicionar Voluntário'],
            ['id' => '34', 'nome' => 'adm-editar-voluntario', 'descricao' => 'Editar Voluntário'],
            ['id' => '35', 'nome' => 'adm-excluir-voluntario', 'descricao' => 'Excluir Voluntário'],
            ['id' => '36', 'nome' => 'adm-menu-relatorios', 'descricao' => 'Menu Relatórios'],
            ['id' => '37', 'nome' => 'adm-relatorio-mensal-voluntario', 'descricao' => 'Relatório Mensal Voluntários'],
            ['id' => '38', 'nome' => 'adm-detalhar-voluntario', 'descricao' => 'Detalhar Voluntário'],
        ];

        foreach ($data as $item) {
            Permission::create($item);

            DB::table('permission_role')->insert([
                'id' => $item['id'],
                'permission_id' => $item['id'],
                'role_id' => 1,
            ]);
        }

    }
}
