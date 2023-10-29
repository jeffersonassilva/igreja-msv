<x-app-layout>
    <x-slot name="header">
        Permissões
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-permissao')
                    <x-button.link title="Adicionar Permissão" :route="route('permissoes.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @if(count($permissoes))
                @foreach($permissoes as $permissao)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">{{ $permissao->nome }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4 dark:text-[#d0d9e6]">
                        {{ $permissao->descricao }}
                    </p>
                    @canany(['adm-editar-permissao'])
                        <div class="text-sm mt-3 text-sm flex gap-2">
                            <x-button.link title="Editar" :route="route('permissoes.edit', $permissao)"></x-button.link>
                        </div>
                    @endcanany
                </div>
              @endforeach

        </div>
        <div class="mb-4">
            {{ $permissoes->links() }}
        </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
