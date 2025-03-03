@props(['escala'])

<div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47] relative">
    <div class="absolute top-4 left-[-3px] h-[30px] w-[3px]"
         style="background: {{ $escala->evento->cor ?? '#777' }}">
    </div>
    <div class="flex-1">
        <div class="mb-3 text-lg" style="color: {{ $escala->evento->cor ?? '#777' }}">
            {{ $escala->evento->descricao }}
        </div>
        <div class="flex items-center">
            <div class="text-4xl text-gray-700 dark:text-gray-200 tracking-tighter">
                {{ \Carbon\Carbon::parse($escala->data)->format('d') }}
            </div>
            <div class="flex flex-col pl-4 flex-1">
                <span class="text-gray-600 dark:text-gray-300">
                    {{ \Carbon\Carbon::parse($escala->data)->dayName }}
                </span>
                <span class="text-sm font-thin text-gray-500 dark:text-gray-400">
                    {{ \Carbon\Carbon::parse($escala->data)->monthName }}
                    de {{ \Carbon\Carbon::parse($escala->data)->format('Y') }}
                    às {{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h
                </span>
            </div>
        </div>
        <section class="flex gap-1 mt-3 justify-centers">
            @if($escala->dirigente)
                <div class="border border-blue-200 text-gray-500 px-1 text-xs rounded-md flex items-center gap-1
                            dark:border-gray-600 dark:text-gray-200">
                    Dirigente
                    <ion-icon name="checkmark"></ion-icon>
                </div>
            @endif
            @if($escala->pregador)
                <div class="border border-blue-200 text-gray-500 px-1 text-xs rounded-md flex items-center gap-1
                            dark:border-gray-600 dark:text-gray-200">
                    Pregador
                    <ion-icon name="checkmark"></ion-icon>
                </div>
            @endif
            @if($escala->tema)
                <div class="border border-blue-200 text-gray-500 px-1 text-xs rounded-md flex items-center gap-1
                            dark:border-gray-600 dark:text-gray-200">
                    Tema
                    <ion-icon name="checkmark"></ion-icon>
                </div>
            @endif
            @if($escala->ministro)
                <div class="border border-blue-200 text-gray-500 px-1 text-xs rounded-md flex items-center gap-1
                            dark:border-gray-600 dark:text-gray-200">
                    Louvor
                    <ion-icon name="checkmark"></ion-icon>
                </div>
            @endif
        </section>
    </div>

    @canany(['adm-editar-escala', 'adm-excluir-escala'])
        <x-dropdown.actions dropdownId="dropdownEscalas-{{ $escala }}" buttonId="dropdownButton-{{ $escala }}">
            @can('adm-editar-escala')
                <div>
                    <x-button.link title="Editar"
                                   icon="create-outline"
                                   :route="route('escalas.edit', $escala)"
                                   :dropdown="true">
                    </x-button.link>
                </div>
                <div>
                    <x-button.link title="Informações Gerais"
                                   icon="information-circle-outline"
                                   :route="route('escalas.edit.info', $escala)"
                                   :dropdown="true">
                    </x-button.link>
                </div>
            @endcan
            @can('adm-excluir-escala')
                <div>
                    <x-button.delete
                        :route="route('escalas.destroy', $escala)"
                        formId="form-excluir-escala-{{ $escala->id }}"
                        :dropdown="true"
                        icon="trash-outline">
                    </x-button.delete>
                </div>
            @endcan
        </x-dropdown.actions>
    @endcanany
</div>
