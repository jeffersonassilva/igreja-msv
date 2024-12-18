<x-app-layout>
    <x-slot name="header">
        Funções
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-escala-funcao')
                    <x-button.link title="Adicionar Função" :route="route('funcoes.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
            @foreach($funcoes as $funcao)
                <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
                    <div class="flex-1">
                        <h3 class="text-gray-700 dark:text-white">
                            {{ $funcao->abreviacao }}
                        </h3>
                        <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                            {{ $funcao->descricao }}
                        </p>
                    </div>
                    @canany(['adm-editar-escala-funcao', 'adm-excluir-escala-funcao'])
                        <div class="text-sm flex gap-2 md:gap-2">
                            @can('adm-editar-escala-funcao')
                                <x-button.link title=""
                                               class="text-lg py-3"
                                               icon="create-outline"
                                               :lighter="true"
                                               :route="route('funcoes.edit', $funcao)">
                                </x-button.link>
                            @endcan

                            @can('adm-excluir-escala-funcao')
                                <x-button.delete title=""
                                                 icon="trash-outline"
                                                 class="text-lg text-red-500 py-3"
                                                 :route="route('funcoes.destroy', $funcao)"
                                                 formId="form-excluir-escala-funcao-{{ $funcao->id }}">
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
