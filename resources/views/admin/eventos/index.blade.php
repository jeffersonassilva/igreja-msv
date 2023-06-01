<x-app-layout>
    <x-slot name="header">
        Eventos
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-evento')
                    <x-button.link title="Adicionar Evento" :route="route('eventos.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($eventos as $evento)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">{{ $evento->descricao }}</h3>
                    <p class="text-sm mt-2 font-thin text-gray-500 dark:text-[#d0d9e6]">
                        Situação: {{ $evento->situacao ? 'Ativo' : 'Inativo' }}
                    </p>
                    @canany(['adm-editar-evento', 'adm-excluir-evento'])
                        <div class="text-sm mt-3 text-sm flex gap-2">
                            @can('adm-editar-evento')
                                <x-button.link title="Editar" :route="route('eventos.edit', $evento)"></x-button.link>
                            @endcan

                            @can('adm-excluir-evento')
                                <x-button.delete :route="route('eventos.destroy', $evento)" formId="form-excluir-evento-{{ $evento->id }}"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
