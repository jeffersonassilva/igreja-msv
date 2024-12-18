@props(['voluntario'])

<div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47] dark:border-[#252c47]">
    <div class="shrink-0">
        @if($voluntario->foto)
            <img src="{{ asset($voluntario->foto) }}"
                 alt="avatar"
                 class="w-12 rounded-full object-cover aspect-square transition-all hover:w-24 lg:hover:w-12
                        border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
        @else
            @if($voluntario->sexo == 'M')
                <img src="{{ asset('img/icon_profile_man.jpg') }}"
                     alt="avatar"
                     class="w-12 rounded-full object-cover aspect-square
                            border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
            @else
                <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                     alt="avatar"
                     class="w-12 rounded-full object-cover aspect-square
                            border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
            @endif
        @endif
    </div>

    <div class="flex-1">
        <h3 class="text-gray-700 dark:text-white sm:line-clamp-1">
            {{ $voluntario->nome }}
        </h3>
        <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
            {{ $voluntario->sexo === 'M' ? 'Masculino' : 'Feminino' }}
        </p>
    </div>

    <div x-data="{ open: false }" class="relative">
        @canany(['adm-editar-voluntario', 'adm-detalhar-voluntario', 'adm-excluir-voluntario'])
            <x-dropdown.link title=""
                             class="text-lg py-3"
                             icon="ellipsis-vertical-outline"
                             :lighter="true"
                             @click="open = !open">
            </x-dropdown.link>
        @endcanany
        <!-- Dropdown -->
        <div
            x-show="open"
            @click.away="open = false"
            class="absolute right-0 mt-1 w-36 bg-white rounded-lg shadow-lg z-10
                   border border-gray-200 dark:border-gray-500 dark:text-[#d0d9e6] dark:bg-[#51596b]">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                @can('adm-editar-voluntario')
                    <li>
                        <a href="{{ route('voluntarios.edit', $voluntario) }}"
                           class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <ion-icon name="create-outline"></ion-icon>
                            Editar
                        </a>
                    </li>
                @endcan
                @can('adm-detalhar-voluntario')
                    <li>
                        <a href="{{ route('voluntarios.show', $voluntario) }}"
                           class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <ion-icon name="eye-outline"></ion-icon>
                            Visualizar
                        </a>
                    </li>
                @endcan
                @can('adm-excluir-voluntario')
                    <li>
                        <form method="POST" action="{{ route('voluntarios.destroy', $voluntario) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    class="flex items-center gap-2 w-full text-left px-4 py-2
                                           hover:bg-gray-100 dark:hover:bg-gray-700 btn-dialog-open">
                                <ion-icon name="trash-outline"></ion-icon>
                                Excluir
                            </button>
                        </form>
                    </li>
                @endcan
            </ul>
        </div>
    </div>

</div>
