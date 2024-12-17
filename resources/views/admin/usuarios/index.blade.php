<x-app-layout>
    <x-slot name="header">
        Usuários
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-usuario')
                    <x-button.link title="Adicionar Usuário" :route="route('usuarios.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
            @foreach($usuarios as $usuario)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px]
                            border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">{{ $usuario->name }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin
                              overflow-hidden line-clamp-4 dark:text-[#d0d9e6]">
                        {{ $usuario->email }}
                    </p>
                    @if($usuario->email !== 'jeffersonassilva@gmail.com')
                        @canany(['adm-editar-usuario', 'adm-excluir-usuario'])
                            <div class="text-sm mt-3 flex gap-2">
                                @can('adm-editar-usuario')
                                    <x-button.link title="Editar"
                                                   :route="route('usuarios.edit', $usuario)">
                                    </x-button.link>
                                @endcan

                                @can('adm-excluir-usuario')
                                    <x-button.delete :route="route('usuarios.destroy', $usuario)"
                                                     formId="form-excluir-usuario-{{ $usuario->id }}">
                                    </x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
