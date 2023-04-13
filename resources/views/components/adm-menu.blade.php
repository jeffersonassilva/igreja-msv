<nav class="sidebar flex flex-col mt-4 lg:mt-10">
    <x-adm-menu-item group="dashboard" :route="'dashboard'" :icon="'home-outline'">Home</x-adm-menu-item>
    @can('adm-menu-testemunho')
        <x-adm-menu-item group="testemunhos" :route="'testemunhos'" :icon="'chatbox-outline'">Testemunhos</x-adm-menu-item>
    @endcan
    @can('adm-menu-evento')
        <x-adm-menu-item group="eventos" :route="'eventos'" :icon="'calendar-outline'">Eventos</x-adm-menu-item>
    @endcan
    @can('adm-menu-escala')
        <x-adm-menu-item group="escalas" :route="'escalas'" :icon="'calendar-number-outline'">Escalas</x-adm-menu-item>
    @endcan
    @can('adm-menu-voluntario')
        <x-adm-menu-item group="voluntarios" :route="'voluntarios'" :icon="'shirt-outline'">Voluntários</x-adm-menu-item>
    @endcan
    @can('adm-menu-relatorios')
        <x-adm-menu-item group="relatorio" :route="'relatorio.mensal.voluntarios'" :icon="'document-text-outline'">Relatório</x-adm-menu-item>
    @endcan
    @can('adm-menu-usuario')
        <x-adm-menu-item group="usuarios" :route="'usuarios'" :icon="'person-outline'">Usuários</x-adm-menu-item>
    @endcan
    @can('adm-menu-perfil')
        <x-adm-menu-item group="perfis" :route="'perfis'" :icon="'id-card-outline'">Perfis</x-adm-menu-item>
    @endcan
    <x-adm-menu-item group="configuracoes" :route="'configuracoes'" :icon="'settings-outline'">Configurações</x-adm-menu-item>
    {{--    <x-adm-menu-item :route="'usuarios'" :icon="'lock-open-outline'">Permissões</x-adm-menu-item>--}}

    <div class="pb-24 md:pb-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="px-6 lg:w-full h-14 relative text-gray-500
                flex gap-4 md:justify-center lg:justify-start items-center
                hover:text-blue-500 hover:pl-8
                transition-all duration-300 ease-in-out"
               href="route('logout')"
               onclick="event.preventDefault();
               this.closest('form').submit();">
                <ion-icon name="log-out-outline"></ion-icon>
                <h3 class="md:hidden lg:block text-sm font-medium">Sair</h3>
            </a>
        </form>
    </div>
</nav>
