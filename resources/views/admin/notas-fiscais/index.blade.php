<x-app-layout>
    <x-slot name="header">
        Notas Fiscais
    </x-slot>

    <section>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($notasFiscais as $nota)
                <div class="relative flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px]
                            border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <div class="mb-3 text-2xl text-gray-700 font-medium dark:text-white">
                        {{ \App\Helpers\Strings::getMoedaFormatada($nota->valor, 'R$ ') }}
                    </div>
                    <div class="mb-3 flex gap-2 items-end text-gray-700 dark:text-[#d0d9e6]">
                        <div class="text-sm bg-gray-100 dark:border dark:border-[#52596b]
                                    dark:bg-transparent p-2 px-3 rounded-md">
                            {{ \Carbon\Carbon::parse($nota->data)->format('d/m/Y') }}
                        </div>
                        <div class="text-sm bg-gray-100 dark:border dark:border-[#52596b]
                                    dark:bg-transparent p-2 px-3 rounded-md">
                            {{ $nota->cartao_id ? 'Cartão: ' . $nota->cartao->identificador : 'Dinheiro' }}
                        </div>
                    </div>
                    <div class="mb-3 text-lg text-gray-700 dark:text-[#d0d9e6]">
                        {{ \App\Services\CategoriaService::getDescricaoById($nota->categoria) }}
                    </div>
                    <div class="flex-1 mb-2">
                        <div class="text-sm mb-1 text-gray-700 font-thin dark:text-[#d0d9e6]">
                            Responsável: {{ $nota->membro->nome_formatado }}
                        </div>
                        <div class="text-sm mb-1 text-gray-700 font-thin dark:text-[#d0d9e6]">
                            Descrição: {{ $nota->descricao }}
                        </div>
                        <div class="text-sm text-gray-700 font-thin dark:text-[#d0d9e6]">
                            Observações: {{ $nota->observacao }}
                        </div>
                    </div>

                    <div class="text-sm mt-3 flex gap-2">
                        <x-button.link title="Visualizar Arquivo"
                                       target="_blank"
                                       :lighter="true"
                                       :route="asset($nota->arquivo)">
                        </x-button.link>

                        @can('adm-arquivar-nota-fiscal')
                            <x-button.delete title="Arquivar Nota" :route="route('notas-fiscais.archive', $nota)"
                                             bg="text-white bg-primary hover:bg-primary-dark focus:bg-primary-dark
                                             dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300"
                                             formId="form-arquivar-nota-fiscal-{{ $nota->id }}"></x-button.delete>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm message="Você tem certeza que deseja arquivar esta nota fiscal?"></x-dialog.confirm>

</x-app-layout>
