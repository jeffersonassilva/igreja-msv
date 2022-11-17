<x-app-layout>
    <x-slot name="header">
        Usuários
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Usuários
            </h3>
            <div class="text-sm">
                @can('adm-adicionar-usuario')
                <a aria-label="Adicionar" href="{{ route('usuarios.create') }}"
                   class="outline-0 rounded-md text-white border border-blue-400 bg-blue-400
                                hover:bg-blue-500
                                focus:bg-blue-500
                                px-2 py-1 inline-flex justify-center items-center">
                    <ion-icon name="add-circle-outline"></ion-icon><span class="ml-1">Adicionar</span>
                </a>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($usuarios as $usuario)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-medium">{{ $usuario->name }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $usuario->email }}
                    </p>
                    @if($usuario->email !== 'jeffersonassilva@gmail.com')
                        @canany(['adm-editar-usuario', 'adm-excluir-usuario'])
                            <div class="text-rights text-sm mt-3">
                                @can('adm-editar-usuario')
                                    <x-button.edit :route="'usuarios.edit'" :object="$usuario"></x-button.edit>
                                @endcan

                                @can('adm-excluir-usuario')
                                    <x-button.delete :route="'usuarios.destroy'" :object="$usuario"></x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
