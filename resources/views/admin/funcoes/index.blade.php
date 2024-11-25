<x-app-layout>
    <x-slot name="header">
        Funções
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-escala-funcao')
                    <x-button.link title="Adicionar Função" :route="route('funcoes.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($funcoes as $funcao)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md
                            border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">
                        {{ $funcao->abreviacao }} - {{ $funcao->descricao }}
                    </h3>
                    @canany(['adm-editar-escala-funcao', 'adm-excluir-escala-funcao'])
                        <div class="text-sm mt-3 flex gap-2">
                            @can('adm-editar-escala-funcao')
                                <x-button.link title="Editar" :route="route('funcoes.edit', $funcao)"></x-button.link>
                            @endcan

                            @can('adm-excluir-escala-funcao')
                                <x-button.delete
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
