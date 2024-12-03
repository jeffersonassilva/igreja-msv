<x-app-layout>
    <x-slot name="header">
        Perfis
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-perfil')
                    <x-button.link title="Adicionar Perfil" :route="route('perfis.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
            @foreach($perfis as $perfil)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px]
                            border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                    <h3 class="text-gray-700 font-medium dark:text-white">{{ $perfil->descricao }}</h3>
                    @canany(['adm-editar-perfil', 'adm-excluir-perfil'])
                        <div class="text-sm mt-3 flex gap-2">
                            @can('adm-editar-perfil')
                                <x-button.link title="Editar" :route="route('perfis.edit', $perfil)"></x-button.link>
                            @endcan

                            @can('adm-excluir-perfil')
                                <x-button.delete :route="route('perfis.destroy', $perfil)"
                                                 formId="form-excluir-perfil-{{ $perfil->id }}">
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
