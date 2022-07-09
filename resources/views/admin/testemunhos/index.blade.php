<x-app-layout>
    <x-slot name="header">
        Testemunhos
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Testemunhos
            </h3>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($testemunhos as $testemunho)
                <div class="relative flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <span class="absolute top-2 right-2 flex justify-center items-center rounded-sm h-6 p-1 {{ $testemunho->situacao ? 'text-green-600' : 'text-red-400' }}">
                        <span class="text-xl flex items-center ml-1"><ion-icon name="{{ $testemunho->situacao ? 'checkmark-circle-outline' : 'close-circle-outline' }}"></ion-icon></span>
                    </span>
                    <h3 class="text-gray-700 font-semibold">{{ $testemunho->nome }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $testemunho->mensagem }}
                    </p>
                    <p class="text-sm mt-2 font-thin">
                        Situação: {{ $testemunho->situacao ? 'Ativo' : 'Pendente' }}
                    </p>
                    <div class="text-rights text-sm mt-3">
                        <a aria-label="Editar" href="{{ route('testemunhos.edit', $testemunho) }}"
                           class="outline-0 rounded-md text-blue-400 border border-blue-400
                            hover:text-white hover:bg-blue-400
                            focus:text-white focus:bg-blue-400
                            px-2 py-1 inline-flex justify-center items-center">
                            <ion-icon name="create-outline"></ion-icon><span class="ml-1">Editar</span>
                        </a>
                        @if($testemunho->situacao)
                            <a aria-label="Inativar" href="{{ route('testemunhos.disable', $testemunho) }}"
                               class="outline-0 rounded-md text-blue-400 border border-blue-400
                                hover:text-white hover:bg-blue-400
                                focus:text-white focus:bg-blue-400
                                px-2 py-1 inline-flex justify-center items-center">
                                <ion-icon name="close-circle-outline"></ion-icon><span class="ml-1">Desativar</span>
                            </a>
                        @else
                            <a aria-label="Ativar" href="{{ route('testemunhos.enable', $testemunho) }}"
                               class="outline-0 rounded-md text-blue-400 border border-blue-400
                            hover:text-white hover:bg-blue-400
                            focus:text-white focus:bg-blue-400
                            px-2 py-1 inline-flex justify-center items-center">
                                <ion-icon name="checkmark-circle-outline"></ion-icon><span class="ml-1">Ativar</span>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
