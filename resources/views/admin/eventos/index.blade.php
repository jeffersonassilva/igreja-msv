<x-app-layout>
    <x-slot name="header">
        Eventos
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-evento')
                    <x-button.link title="Adicionar Evento" :route="route('eventos.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
            @foreach($eventos as $evento)
                <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
                    <div class="flex-1">
                        <h3 class="text-gray-700 dark:text-white">
                            {{ $evento->descricao }}
                        </h3>
                        <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                            {{ $evento->situacao ? 'Ativo' : 'Inativo' }}
                        </p>
                    </div>
                    @canany(['adm-editar-evento', 'adm-excluir-evento'])
                        <div class="text-sm flex gap-2 md:gap-2">
                            @can('adm-editar-evento')
                                <x-button.link title=""
                                               class="text-lg py-3"
                                               icon="create-outline"
                                               :lighter="true"
                                               :route="route('eventos.edit', $evento)">
                                </x-button.link>
                            @endcan

                            @can('adm-excluir-evento')
                                <x-button.delete title=""
                                                 icon="trash-outline"
                                                 class="text-lg text-red-500 py-3"
                                                 :route="route('eventos.destroy', $evento)"
                                                 formId="form-excluir-evento-{{ $evento->id }}">
                                </x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
