<nav class="sidebar flex flex-col mt-4 px-4">
    <x-adm-menu-item group="dashboard" :route="'dashboard'" :icon="'desktop-outline'">Dashboard</x-adm-menu-item>

{{--    @can('adm-menu-testemunho')--}}
{{--        <x-adm-menu-item group="testemunhos" :route="'testemunhos'" :icon="'chatbox-outline'">Testemunhos</x-adm-menu-item>--}}
{{--    @endcan--}}

    @canany(['adm-menu-evento', 'adm-menu-escala', 'adm-menu-voluntario', 'adm-menu-relatorios'])
        <x-adm-menu-group name="Gestão de Escalas" id="gestao_escalas" icon="shirt-outline"
                          :groups='["eventos", "escalas", "voluntarios", "relatorio"]'
                          :submenus='[
                            ["label" => "Eventos", "route" => "eventos", "permission" => "adm-menu-evento"],
                            ["label" => "Escalas", "route" => "escalas", "permission" => "adm-menu-escala"],
                            ["label" => "Voluntários", "route" => "voluntarios", "permission" => "adm-menu-voluntario"],
                            ["label" => "Relatório", "route" => "relatorio.mensal.voluntarios", "permission" => "adm-menu-relatorios"]
                          ]'>
        </x-adm-menu-group>
    @endcan

    @canany(['adm-menu-usuario', 'adm-menu-perfil'])
        <x-adm-menu-group name="Segurança" id="seguranca" icon="key-outline"
                          :groups='["usuarios", "perfis"]'
                          :submenus='[
                            ["label" => "Usuários", "route" => "usuarios", "permission" => "adm-menu-usuario"],
                            ["label" => "Perfis", "route" => "perfis", "permission" => "adm-menu-perfil"]
                          ]'>
        </x-adm-menu-group>
    @endcan

    <x-adm-menu-item group="configuracoes" :route="'configuracoes'" :icon="'settings-outline'">Configurações</x-adm-menu-item>
    {{--    <x-adm-menu-item :route="'usuarios'" :icon="'lock-open-outline'">Permissões</x-adm-menu-item>--}}

    <div class="pb-24 md:pb-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="border-t border-t-gray-100 px-2 lg:w-full h-14 relative text-gray-500
                flex gap-4 items-center lg:hover:pl-3
                transition-all duration-300 ease-in-out"
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
