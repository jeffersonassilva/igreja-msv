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
            ['id' => '39', 'nome' => 'adm-menu-site', 'descricao' => 'Menu Site'],
            ['id' => '40', 'nome' => 'adm-menu-cartao', 'descricao' => 'Menu Cartões'],
            ['id' => '41', 'nome' => 'adm-listar-cartao', 'descricao' => 'Listar Cartões'],
            ['id' => '42', 'nome' => 'adm-adicionar-cartao', 'descricao' => 'Adicionar Cartão'],
            ['id' => '43', 'nome' => 'adm-editar-cartao', 'descricao' => 'Editar Cartão'],
            ['id' => '44', 'nome' => 'adm-excluir-cartao', 'descricao' => 'Excluir Cartão'],
            ['id' => '45', 'nome' => 'adm-menu-nota-fiscal', 'descricao' => 'Menu Notas Fiscais'],
            ['id' => '46', 'nome' => 'adm-listar-notas-fiscais', 'descricao' => 'Listar Notas Fiscais'],
            ['id' => '47', 'nome' => 'adm-menu-permissao', 'descricao' => 'Menu Permissões'],
            ['id' => '48', 'nome' => 'adm-listar-permissao', 'descricao' => 'Listar Permissões'],
            ['id' => '49', 'nome' => 'adm-adicionar-permissao', 'descricao' => 'Adicionar Permissão'],
            ['id' => '50', 'nome' => 'adm-editar-permissao', 'descricao' => 'Editar Permissão'],
            ['id' => '51', 'nome' => 'adm-menu-relatorios-tesouraria', 'descricao' => 'Menu Relatórios Tesouraria'],
            ['id' => '52', 'nome' => 'adm-menu-membro', 'descricao' => 'Menu Membros'],
            ['id' => '53', 'nome' => 'adm-listar-membro', 'descricao' => 'Listar Membros'],
            ['id' => '54', 'nome' => 'adm-adicionar-membro', 'descricao' => 'Adicionar Membro'],
            ['id' => '55', 'nome' => 'adm-editar-membro', 'descricao' => 'Editar Membro'],
            ['id' => '56', 'nome' => 'adm-excluir-membro', 'descricao' => 'Excluir Membro'],
            ['id' => '57', 'nome' => 'adm-arquivar-nota-fiscal', 'descricao' => 'Arquivar Nota Fiscal'],
            ['id' => '58', 'nome' => 'adm-menu-visitante', 'descricao' => 'Menu Visitantes'],
            ['id' => '59', 'nome' => 'adm-listar-visitante', 'descricao' => 'Listar Visitantes'],
            ['id' => '60', 'nome' => 'adm-editar-visitante', 'descricao' => 'Editar Visitante'],
            ['id' => '61', 'nome' => 'adm-menu-ebd-classes', 'descricao' => 'Menu EBD Classes'],
            ['id' => '62', 'nome' => 'adm-listar-ebd-classes', 'descricao' => 'Listar EBD Classes'],
            ['id' => '63', 'nome' => 'adm-adicionar-ebd-classe', 'descricao' => 'Adicionar EBD Classe'],
            ['id' => '64', 'nome' => 'adm-editar-ebd-classe', 'descricao' => 'Editar EBD Classe'],
            ['id' => '65', 'nome' => 'adm-excluir-ebd-classe', 'descricao' => 'Excluir EBD Classe'],
            ['id' => '66', 'nome' => 'adm-menu-ebd-alunos', 'descricao' => 'Menu EBD Alunos'],
            ['id' => '67', 'nome' => 'adm-listar-ebd-alunos', 'descricao' => 'Listar EBD Alunos'],
            ['id' => '68', 'nome' => 'adm-adicionar-ebd-aluno', 'descricao' => 'Adicionar EBD Aluno'],
            ['id' => '69', 'nome' => 'adm-editar-ebd-aluno', 'descricao' => 'Editar EBD Aluno'],
            ['id' => '70', 'nome' => 'adm-excluir-ebd-aluno', 'descricao' => 'Excluir EBD Aluno'],
            ['id' => '71', 'nome' => 'adm-menu-ebd-calendario', 'descricao' => 'Menu EBD Calendário'],
            ['id' => '72', 'nome' => 'adm-listar-ebd-calendario', 'descricao' => 'Listar EBD Calendário'],
            ['id' => '73', 'nome' => 'adm-adicionar-ebd-calendario', 'descricao' => 'Adicionar EBD Calendário'],
            ['id' => '74', 'nome' => 'adm-editar-ebd-calendario', 'descricao' => 'Editar EBD Calendário'],
            ['id' => '75', 'nome' => 'adm-excluir-ebd-calendario', 'descricao' => 'Excluir EBD Calendário'],
            ['id' => '76', 'nome' => 'adm-menu-ebd-professores', 'descricao' => 'Menu EBD Professores'],
            ['id' => '77', 'nome' => 'adm-listar-ebd-professores', 'descricao' => 'Listar EBD Professores'],
            ['id' => '78', 'nome' => 'adm-adicionar-ebd-professor', 'descricao' => 'Adicionar EBD Professor'],
            ['id' => '79', 'nome' => 'adm-editar-ebd-professor', 'descricao' => 'Editar EBD Professor'],
            ['id' => '80', 'nome' => 'adm-excluir-ebd-professor', 'descricao' => 'Excluir EBD Professor'],
            ['id' => '81', 'nome' => 'adm-menu-escala-funcao', 'descricao' => 'Menu Escala Funções'],
            ['id' => '82', 'nome' => 'adm-listar-escala-funcao', 'descricao' => 'Listar Escala Função'],
            ['id' => '83', 'nome' => 'adm-adicionar-escala-funcao', 'descricao' => 'Adicionar Escala Função'],
            ['id' => '84', 'nome' => 'adm-editar-escala-funcao', 'descricao' => 'Editar Escala Função'],
            ['id' => '85', 'nome' => 'adm-excluir-escala-funcao', 'descricao' => 'Excluir Escala Função'],
            ['id' => '86', 'nome' => 'adm-menu-carta', 'descricao' => 'Menu Cartas'],
            ['id' => '87', 'nome' => 'adm-menu-certificado', 'descricao' => 'Menu Certificados'],
            ['id' => '88', 'nome' => 'adm-resetar-senha-usuario', 'descricao' => 'Resetar Senha do Usuário']
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
