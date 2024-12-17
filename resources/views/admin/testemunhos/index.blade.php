<x-app-layout>
    <x-slot name="header">
        Testemunhos
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <h3 class="text-gray-500 dark:text-[#d0d9e6]">
                Lista de Testemunhos
            </h3>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($testemunhos as $testemunho)
                <div class="relative flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <span class="absolute top-2 right-2 flex justify-center items-center rounded-sm h-6 p-1 {{ $testemunho->situacao ? 'text-green-600' : 'text-red-400' }}">
                        <span class="text-xl flex items-center ml-1"><ion-icon name="{{ $testemunho->situacao ? 'checkmark-circle-outline' : 'close-circle-outline' }}"></ion-icon></span>
                    </span>
                    <h3 class="text-gray-700 font-medium dark:text-[#d0d9e6]">{{ $testemunho->nome }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-500 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $testemunho->mensagem }}
                    </p>
                    <p class="text-sm mt-4 font-thin text-gray-500">
                        Telefone: {{ $testemunho->telefone }}
                        <br />
                        Situação: {{ $testemunho->situacao ? 'Ativo' : 'Pendente' }}
                    </p>
                    <div class="text-sm mt-3">
                        @can('adm-editar-testemunho')
                            <x-button.link title="Editar" :route="route('testemunhos.edit', $testemunho)"></x-button.link>
                        @endcan
                        @if($testemunho->situacao)
                            @can('adm-desativar-testemunho')
                                <x-button.link title="Desativar" :route="route('testemunhos.disable', $testemunho)" :lighter="true"></x-button.link>
                            @endcan
                        @else
                            @can('adm-ativar-testemunho')
                                <x-button.link title="Ativar" :route="route('testemunhos.enable', $testemunho)" :lighter="true"></x-button.link>
                            @endcan
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
