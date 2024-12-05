<x-app-layout>
    <x-slot name="header">
        Alunos
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-ebd-aluno')
                    <x-button.link title="Adicionar Aluno" :route="route('alunos.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($alunos))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
                @foreach($alunos as $aluno)
                    <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm
                                dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="flex-1">
                            <h3 class="text-gray-700 font-normal dark:text-white">
                                {{ $aluno->nome }}
                            </h3>
                            <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6] line-clamp-1">
                                {{ collect($aluno->classes)->take(2)->pluck('nome')->implode(', ') }}
                                @if(count($aluno->classes) > 2)
                                    ...
                                @endif
                            </p>
                        </div>

                        @canany(['adm-editar-ebd-aluno', 'adm-excluir-ebd-aluno'])
                            <div class="text-sm flex gap-2 md:gap-2">
                                @can('adm-editar-ebd-aluno')
                                    <x-button.link title=""
                                                   class="text-lg py-3"
                                                   icon="create-outline"
                                                   :lighter="true"
                                                   :route="route('alunos.edit', $aluno)">
                                    </x-button.link>
                                @endcan

                                @can('adm-excluir-ebd-aluno')
                                    <x-button.delete title=""
                                                     icon="trash-outline"
                                                     class="text-lg text-red-500 py-3"
                                                     :route="route('alunos.destroy', $aluno)"
                                                     formId="form-excluir-aluno-{{ $aluno->id }}">
                                    </x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    </div>
                @endforeach
            </div>
            <div class="my-4">
                {{ $alunos->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
