@props(['voluntario'])

<div class="bg-white border border-gray-200 rounded-md shadow-sm">
    <div class="flex p-4">
        <div class="flex justify-center items-start mr-2">
            @if($voluntario->sexo == 'M')
                <img src="{{ asset('img/icon_profile_man.jpg') }}"
                     alt="avatar" class="w-[60px] rounded-full object-cover aspect-square border-2 border-gray-100 p-[2px]">
            @else
                <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                     alt="avatar" class="w-[60px] rounded-full object-cover aspect-square border-2 border-gray-100 p-[2px]">
            @endif
        </div>
        <div class="flex-1 grid grid-cols-2 gap-y-2 md:gap-y-2 ml-2">
            <div class="flex flex-col col-span-2">
                <div class="text-gray-800 leading-4 text-lg md:text-xl 2xl:text-2xl font-semibold sm:font-medium">
                    {{ $voluntario->nome }}
                </div>
            </div>
            <div class="flex flex-col grid-cols-1">
                <div class="font-thin text-xs md:text-sm text-gray-400">Sexo</div>
                <div class="text-gray-700 leading-4">{{ $voluntario->sexo === 'M' ? 'Masculino' : 'Feminino' }}</div>
            </div>
            <div class="flex flex-col">
                <div class="font-thin text-xs md:text-sm text-gray-400">Professor EBD</div>
                <div class="text-gray-700 leading-4">{{ $voluntario->professor_ebd == '1' ? 'Sim' : 'Não' }}</div>
            </div>
            @if($voluntario->observacao)
                <div class="flex flex-col col-span-2 md:hidden">
                    <div class="font-thin text-xs md:text-sm text-gray-400">Observações</div>
                    <div class="text-gray-700">{{ $voluntario->observacao }}</div>
                </div>
            @endif
        </div>
    </div>

    @canany(['adm-editar-voluntario', 'adm-excluir-voluntario'])
        <div class="text-sm flex justify-evenly gap-2 border-t border-t-gray-100 px-4 md:px-6 py-3">
            @can('adm-editar-voluntario')
                <x-button.link title="Editar" :route="route('voluntarios.edit', $voluntario)"></x-button.link>
            @endcan

            @can('adm-detalhar-voluntario')
                <x-button.link title="Detalhar" :lighter="true" :route="route('voluntarios.show', $voluntario)"></x-button.link>
            @endcan

            @can('adm-excluir-voluntario')
                <x-button.delete :route="route('voluntarios.destroy', $voluntario)" formId="form-excluir-voluntario-{{ $voluntario->id }}"></x-button.delete>
            @endcan
        </div>
    @endcanany
</div>
