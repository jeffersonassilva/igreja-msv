<x-app-layout>
    <x-slot name="header">
        Professores
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-rights text-sm">
                @can('adm-adicionar-ebd-professor')
                    <x-button.link title="Adicionar Professor" :route="route('professores.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($professores))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
                @foreach($professores as $professor)
                    <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                        <h3 class="text-gray-700 font-medium dark:text-white">{{ $professor->nome }}</h3>
                        @canany(['adm-editar-ebd-professor', 'adm-excluir-ebd-professor'])
                            <div class="text-sm mt-3 flex gap-2">
                                @can('adm-editar-ebd-professor')
                                    <x-button.link title="Editar" :route="route('professores.edit', $professor)"></x-button.link>
                                @endcan

                                @can('adm-excluir-ebd-professor')
                                    <x-button.delete :route="route('professores.destroy', $professor)" formId="form-excluir-professor-{{ $professor->id }}"></x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                {{ $professores->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
