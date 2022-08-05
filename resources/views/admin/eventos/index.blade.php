<x-app-layout>
    <x-slot name="header">
        Eventos
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Eventos
            </h3>
            <div class="text-rights text-sm">
                <a aria-label="Adicionar" href="{{ route('eventos.create') }}"
                   class="outline-0 rounded-md text-white border border-blue-400 bg-blue-400
                                hover:bg-blue-500
                                focus:bg-blue-500
                                px-2 py-1 inline-flex justify-center items-center">
                    <ion-icon name="add-circle-outline"></ion-icon><span class="ml-1">Adicionar</span>
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($eventos as $evento)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-medium">{{ $evento->descricao }}</h3>
                    <p class="text-sm mt-2 font-thin text-gray-500">
                        Situação: {{ $evento->situacao ? 'Ativo' : 'Inativo' }}
                    </p>
                    <div class="text-rights text-sm mt-3">
                        <a aria-label="Editar" href="{{ route('eventos.edit', $evento) }}"
                           class="outline-0 rounded-md text-blue-400 border border-blue-400
                            hover:text-white hover:bg-blue-400
                            focus:text-white focus:bg-blue-400
                            px-2 py-1 inline-flex justify-center items-center">
                            <ion-icon name="create-outline"></ion-icon><span class="ml-1">Editar</span>
                        </a>
                        <form action="{{ route('eventos.destroy', $evento) }}" method="POST" class="inline">
                            @method('DELETE')
                            @csrf
                            <button aria-label="Excluir"
                                    class="outline-0 rounded-md text-blue-400 border border-blue-400
                                hover:text-white hover:bg-blue-400
                                focus:text-white focus:bg-blue-400
                                px-2 py-1 mr-1 inline-flex justify-center items-center">
                                <ion-icon name="archive-outline"></ion-icon><span class="ml-1">Excluir</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>