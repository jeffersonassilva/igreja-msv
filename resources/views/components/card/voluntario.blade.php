@props(['voluntario'])

<div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
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

    @canany(['adm-editar-voluntario', 'adm-detalhar-voluntario', 'adm-excluir-voluntario'])
        <x-dropdown.actions dropdownId="dropdownVolunteer-{{ $voluntario }}"
                            buttonId="dropdownButton-{{ $voluntario }}">
            @can('adm-editar-voluntario')
                <div>
                    <x-button.link title="Editar"
                                   icon="create-outline"
                                   :route="route('voluntarios.edit', $voluntario)"
                                   :dropdown="true">
                    </x-button.link>
                </div>
            @endcan
            @can('adm-detalhar-voluntario')
                <div>
                    <x-button.link title="Visualizar"
                                   icon="eye-outline"
                                   :route="route('voluntarios.show', $voluntario)"
                                   :dropdown="true">
                    </x-button.link>
                </div>
            @endcan
            @can('adm-excluir-voluntario')
                <div>
                    <x-button.delete
                        :route="route('voluntarios.destroy', $voluntario)"
                        formId="form-excluir-voluntario-{{ $voluntario->id }}"
                        :dropdown="true"
                        icon="trash-outline">
                    </x-button.delete>
                </div>
            @endcan
        </x-dropdown.actions>
    @endcanany
</div>
