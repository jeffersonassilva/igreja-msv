<x-app-layout>
    <x-slot name="header">
        Cartões
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-cartao')
                    <x-button.link title="Adicionar Cartão" :route="route('cartoes.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($cartoes as $cartao)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">{{ $cartao->identificador }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4 dark:text-[#d0d9e6]">
                        {{ $cartao->numero }}
                    </p>
                    @canany(['adm-editar-cartao', 'adm-excluir-cartao'])
                        <div class="text-sm mt-3 text-sm flex gap-2">
{{--                            @can('adm-editar-cartao')--}}
{{--                                <x-button.link title="Editar" :route="route('cartoes.edit', $cartao)"></x-button.link>--}}
{{--                            @endcan--}}

                            @can('adm-excluir-cartao')
                                <x-button.delete :route="route('cartoes.destroy', $cartao)" formId="form-excluir-cartao-{{ $cartao->id }}"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
