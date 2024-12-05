<x-app-layout>
    <x-slot name="header">
        Cartões
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-cartao')
                    <x-button.link title="Adicionar Cartão" :route="route('cartoes.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
            @foreach($cartoes as $cartao)
                <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
                    <div class="flex-1">
                        <h3 class="text-gray-700 dark:text-white">
                            {{ $cartao->identificador }}
                        </h3>
                        <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                            {{ \App\Helpers\Strings::getCartaoFormatado($cartao->numero) }}
                        </p>
                    </div>
                    @canany(['adm-editar-cartao', 'adm-excluir-cartao'])
                        <div class="text-sm flex gap-2 md:gap-2">
                            @can('adm-editar-cartao')
                                <x-button.link title=""
                                               class="text-lg py-3"
                                               icon="create-outline"
                                               :lighter="true"
                                               :route="route('cartoes.edit', $cartao)">
                                </x-button.link>
                            @endcan

                            @can('adm-excluir-cartao')
                                <x-button.delete title=""
                                                 icon="trash-outline"
                                                 class="text-lg text-red-500 py-3"
                                                 :route="route('cartoes.destroy', $cartao)"
                                                 formId="form-excluir-cartao-{{ $cartao->id }}">
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
