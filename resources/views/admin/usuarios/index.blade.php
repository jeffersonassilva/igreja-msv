<x-app-layout>
    <x-slot name="header">
        Usuários
    </x-slot>

    <div class="pb-6 md:py-6">
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Usuários
            </h3>
            <div class="text-rights text-sm">
                <a aria-label="Adicionar" href="{{ route('usuarios.create') }}"
                   class="outline-0 rounded-md text-white border border-blue-400 bg-blue-400
                                hover:bg-blue-500
                                focus:bg-blue-500
                                px-2 py-1 inline-flex justify-center items-center">
                    <ion-icon name="add-circle-outline"></ion-icon><span class="ml-1">Adicionar</span>
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($usuarios as $usuario)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-semibold">{{ $usuario->name }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $usuario->email }}
                    </p>
                    @if($usuario->email !== 'jeffersonassilva@gmail.com')
                    <div class="text-rights text-sm mt-3">
                        <a aria-label="Editar" href="{{ route('usuarios.edit', $usuario) }}"
                           class="outline-0 rounded-md text-blue-400 border border-blue-400
                                hover:text-white hover:bg-blue-400
                                focus:text-white focus:bg-blue-400
                                px-2 py-1 inline-flex justify-center items-center">
                            <ion-icon name="create-outline"></ion-icon><span class="ml-1">Editar</span>
                        </a>
                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline">
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
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
