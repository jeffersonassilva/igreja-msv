<x-app-layout>
    <x-slot name="header">
        Professores
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-ebd-professor')
                    <x-button.link title="Adicionar Professor" :route="route('professores.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($professores))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
                @foreach($professores as $professor)
                    <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm
                                dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="flex-1">
                            <h3 class="text-gray-700 dark:text-white">
                                {{ $professor->nome }}
                            </h3>
                            <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6] line-clamp-1">
                                {{ collect($professor->classes)->take(2)->pluck('nome')->implode(', ') }}
                                @if(count($professor->classes) > 2)
                                    ...
                                @endif
                            </p>
                        </div>
                        @canany(['adm-editar-ebd-professor', 'adm-excluir-ebd-professor'])
                            <div class="text-sm flex gap-2 md:gap-2">
                                @can('adm-editar-ebd-professor')
                                    <x-button.link title=""
                                                   class="text-lg py-3"
                                                   icon="create-outline"
                                                   :lighter="true"
                                                   :route="route('professores.edit', $professor)">
                                    </x-button.link>
                                @endcan

                                @can('adm-excluir-ebd-professor')
                                    <x-button.delete title=""
                                                     icon="trash-outline"
                                                     class="text-lg text-red-500 py-3"
                                                     :route="route('professores.destroy', $professor)"
                                                     formId="form-excluir-professor-{{ $professor->id }}">
                                    </x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    </div>
                @endforeach
            </div>
            <div class="my-4">
                {{ $professores->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
