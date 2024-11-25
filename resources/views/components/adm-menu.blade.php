<nav class="sidebar flex flex-col mt-4 px-4">
    <x-adm-menu-item group="dashboard" :route="'dashboard'" :icon="'grid-outline'">Dashboard</x-adm-menu-item>

    @canany(['adm-menu-site', 'adm-menu-testemunho'])
        <x-adm-menu-group name="Site" id="site" icon="desktop-outline"
                          :groups='["site", "banners", "propositos", "pastor", "testemunhos"]'
                          :submenus='[
                            ["label" => "Tela Principal", "route" => "site", "permission" => "adm-menu-site"],
                            ["label" => "Testemunhos", "route" => "testemunhos", "permission" => "adm-menu-testemunho"]
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-evento', 'adm-menu-escala', 'adm-menu-voluntario', 'adm-menu-relatorios'])
        <x-adm-menu-group name="Gestão de Escalas" id="gestao_escalas" icon="shirt-outline"
                          :groups='["eventos", "escalas", "voluntarios", "relatorio", "funcoes"]'
                          :submenus='[
                            ["label" => "Eventos", "route" => "eventos", "permission" => "adm-menu-evento"],
                            ["label" => "Escalas", "route" => "escalas", "permission" => "adm-menu-escala"],
                            ["label" => "Funções", "route" => "funcoes", "permission" => "adm-menu-escala-funcao"],
                            ["label" => "Voluntários", "route" => "voluntarios", "permission" => "adm-menu-voluntario"],
                            [
                                "label" => "Relatório",
                                "route" => "relatorio.mensal.voluntarios",
                                "permission" => "adm-menu-relatorios"
                            ]
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-membro'])
        <x-adm-menu-group name="Secretaria" id="secretaria" icon="people-outline"
                          :groups='["membros"]'
                          :submenus='[
                            ["label" => "Membros", "route" => "membros", "permission" => "adm-menu-membro"]
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-cartao', 'adm-menu-nota-fiscal', 'adm-menu-relatorios-tesouraria'])
        <x-adm-menu-group name="Tesouraria" id="tesouraria" icon="wallet-outline"
                          :groups='["cartoes", "notas-fiscais", "relatorios-tesouraria"]'
                          :submenus='[
                            ["label" => "Cartões", "route" => "cartoes", "permission" => "adm-menu-cartao"],
                            [
                                "label" => "Notas Fiscais",
                                "route" => "notas-fiscais",
                                "permission" => "adm-menu-nota-fiscal"
                            ],
                            [
                                "label" => "Relatório",
                                "route" => "relatorios-tesouraria",
                                "permission" => "adm-menu-relatorios-tesouraria"
                            ]
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-visitante'])
        <x-adm-menu-group name="Visitantes" id="visitante" icon="cafe-outline"
                          :groups='["visitantes"]'
                          :submenus='[
                            ["label" => "Acompanhamento", "route" => "visitantes", "permission" => "adm-menu-visitante"]
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-ebd-classes'])
        <x-adm-menu-group name="EBD" id="ebd" icon="school-outline"
                          :groups='["classes", "alunos", "calendario", "calendario-fixo", "professores"]'
                          :submenus='[
                            ["label" => "Alunos", "route" => "alunos", "permission" => "adm-menu-ebd-alunos"],
                            [
                                "label" => "Calendário",
                                "route" => "calendario",
                                "permission" => "adm-menu-ebd-calendario"
                            ],
                            [
                                "label" => "Calendário Fixo",
                                "route" => "calendario-fixo",
                                "permission" => "adm-menu-ebd-calendario"
                            ],
                            ["label" => "Classes", "route" => "classes", "permission" => "adm-menu-ebd-classes"],
                            [
                                "label" => "Professores",
                                "route" => "professores",
                                "permission" => "adm-menu-ebd-professores"
                            ],
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-usuario', 'adm-menu-permissao', 'adm-menu-perfil'])
        <x-adm-menu-group name="Segurança" id="seguranca" icon="key-outline"
                          :groups='["usuarios", "perfis", "permissoes"]'
                          :submenus='[
                            ["label" => "Usuários", "route" => "usuarios", "permission" => "adm-menu-usuario"],
                            ["label" => "Permissões", "route" => "permissoes", "permission" => "adm-menu-permissao"],
                            ["label" => "Perfis", "route" => "perfis", "permission" => "adm-menu-perfil"]
                          ]'>
        </x-adm-menu-group>
    @endcan

    <x-adm-menu-item group="configuracoes" :route="'configuracoes'" :icon="'settings-outline'">
        Configurações
    </x-adm-menu-item>

    <div class="pb-24 md:pb-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="border-t border-t-gray-100 px-2 lg:w-full h-14 relative text-gray-500
                flex gap-4 items-center lg:hover:pl-3 dark:border-t-[#263141] dark:text-[#d0d9e6]
                transition-[padding] duration-300 ease-in-out"
               href="route('logout')"
               onclick="event.preventDefault();
               this.closest('form').submit();">
                <div class="lg:w-[22px]">
                    <ion-icon name="log-out-outline"></ion-icon>
                </div>
                <h3 class="text-sm font-medium">Sair</h3>
            </a>
        </form>
    </div>
</nav>
