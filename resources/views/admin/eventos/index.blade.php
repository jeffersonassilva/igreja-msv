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
                @can('adm-adicionar-evento')
                    <x-button.link title="Adicionar" :route="route('eventos.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($eventos as $evento)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-medium">{{ $evento->descricao }}</h3>
                    <p class="text-sm mt-2 font-thin text-gray-500">
                        Situação: {{ $evento->situacao ? 'Ativo' : 'Inativo' }}
                    </p>
                    @canany(['adm-editar-evento', 'adm-excluir-evento'])
                        <div class="text-rights text-sm mt-3">
                            @can('adm-editar-evento')
                                <x-button.link title="Editar" :route="route('eventos.edit', $evento)"></x-button.link>
                            @endcan

                            @can('adm-excluir-evento')
                                <x-button.delete :route="route('eventos.destroy', $evento)"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
