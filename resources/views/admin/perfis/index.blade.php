<x-app-layout>
    <x-slot name="header">
        Perfis
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Perfis
            </h3>
            <div class="text-rights text-sm">
                @can('adm-adicionar-perfil')
                <a aria-label="Adicionar" href="{{ route('perfis.create') }}"
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
            @foreach($perfis as $perfil)
                <div class="flex flex-col bg-white p-3 rounded-md">
                    <h3 class="text-gray-700 font-medium">{{ $perfil->descricao }}</h3>
                    @canany(['adm-editar-perfil', 'adm-excluir-perfil'])
                        <div class="text-rights text-sm mt-3">
                            @can('adm-editar-perfil')
                                <a aria-label="Editar" href="{{ route('perfis.edit', $perfil) }}"
                                   class="outline-0 rounded-md text-blue-400 border border-blue-400
                                   hover:text-white hover:bg-blue-400 focus:text-white focus:bg-blue-400
                                   px-2 py-1 inline-flex justify-center items-center">
                                    <ion-icon name="create-outline"></ion-icon>
                                    <span class="ml-1">Editar</span>
                                </a>
                            @endcan

                            @can('adm-excluir-perfil')
                                <x-button.delete :route="'perfis.destroy'" :object="$perfil"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
