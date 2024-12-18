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
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
            @foreach($perfis as $perfil)
                <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
                    <div class="flex-1">
                        <h3 class="text-gray-700 dark:text-white">
                            {{ $perfil->descricao }}
                        </h3>
                        <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                            {{ collect($perfil->permissions)->count(4) }} permissões
                        </p>
                    </div>

                    @canany(['adm-editar-perfil', 'adm-excluir-perfil'])
                        <div class="text-sm flex gap-2 md:gap-2">
                            @can('adm-editar-perfil')
                                <x-button.link title=""
                                               class="text-lg py-3"
                                               icon="create-outline"
                                               :lighter="true"
                                               :route="route('perfis.edit', $perfil)">
                                </x-button.link>
                            @endcan

                            @can('adm-excluir-perfil')
                                <x-button.delete title=""
                                                 icon="trash-outline"
                                                 class="text-lg text-red-500 py-3"
                                                 :route="route('perfis.destroy', $perfil)"
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
