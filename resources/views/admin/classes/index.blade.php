<x-app-layout>
    <x-slot name="header">
        Classes
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-rights text-sm">
                @can('adm-adicionar-classe')
                    <x-button.link title="Adicionar Classe" :route="route('classes.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($classes as $classe)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">{{ $classe->nome }}</h3>
                    @canany(['adm-editar-classe', 'adm-excluir-classe'])
                        <div class="text-sm mt-3 flex gap-2">
                            @can('adm-editar-classe')
                                <x-button.link title="Editar" :route="route('classes.edit', $classe)"></x-button.link>
                            @endcan

                            @can('adm-excluir-classe')
                                <x-button.delete :route="route('classes.destroy', $classe)" formId="form-excluir-classe-{{ $classe->id }}"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
