<x-app-layout>
    <x-slot name="header">
        Permissões
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-permissao')
                    <x-button.link
                        title="Adicionar Permissão"
                        :route="route('permissoes.create')">
                    </x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
            @if(count($permissoes))
                @foreach($permissoes as $permissao)
                    <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
                        <div class="flex-1">
                            <h3 class="text-gray-700 dark:text-white">
                                {{ $permissao->descricao }}
                            </h3>
                            <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                                {{ $permissao->nome }}
                            </p>
                        </div>

                        @canany(['adm-editar-permissao'])
                            <div class="text-sm flex gap-2 md:gap-2">
                                <x-button.link title=""
                                               class="text-lg py-3"
                                               icon="create-outline"
                                               :lighter="true"
                                               :route="route('permissoes.edit', $permissao)">
                                </x-button.link>
                            </div>
                        @endcanany
                    </div>
                @endforeach

        </div>
        <div class="my-4">
            {{ $permissoes->links() }}
        </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
