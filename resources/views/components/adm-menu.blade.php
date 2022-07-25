<nav class="sidebar flex flex-col mt-4 md:mt-10">
    <x-adm-menu-item :route="'dashboard'" :icon="'home-outline'">Home</x-adm-menu-item>
    <x-adm-menu-item :route="'#'" :icon="'wallet-outline'">Ofertas</x-adm-menu-item>
    <x-adm-menu-item :route="'testemunhos'" :icon="'chatbox-outline'">Testemunhos</x-adm-menu-item>
    <x-adm-menu-item :route="'eventos'" :icon="'calendar-outline'">Eventos</x-adm-menu-item>
    <x-adm-menu-item :route="'escalas'" :icon="'shirt-outline'">Escalas</x-adm-menu-item>
    <x-adm-menu-item :route="'usuarios'" :icon="'person-outline'">Usuários</x-adm-menu-item>
    <x-adm-menu-item :route="'configuracoes'" :icon="'settings-outline'">Configurações</x-adm-menu-item>

    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="px-6 lg:w-full h-14 relative text-gray-400
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
