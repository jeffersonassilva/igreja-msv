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
                    <x-button.link title="Adicionar" :route="route('perfis.create')"></x-button.link>
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
                                <x-button.link title="Editar" :route="route('perfis.edit', $perfil)"></x-button.link>
                            @endcan

                            @can('adm-excluir-perfil')
                                <x-button.delete :route="route('perfis.destroy', $perfil)"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
