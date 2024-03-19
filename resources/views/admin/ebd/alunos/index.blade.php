<x-app-layout>
    <x-slot name="header">
        Alunos
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-rights text-sm">
                @can('adm-adicionar-ebd-aluno')
                    <x-button.link title="Adicionar Aluno" :route="route('alunos.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($alunos))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
                @foreach($alunos as $aluno)
                    <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                        <h3 class="text-gray-700 font-medium dark:text-white">{{ $aluno->nome }}</h3>
                        @canany(['adm-editar-ebd-aluno', 'adm-excluir-ebd-aluno'])
                            <div class="text-sm mt-3 flex gap-2">
                                @can('adm-editar-ebd-aluno')
                                    <x-button.link title="Editar" :route="route('alunos.edit', $aluno)"></x-button.link>
                                @endcan

                                @can('adm-excluir-ebd-aluno')
                                    <x-button.delete :route="route('alunos.destroy', $aluno)" formId="form-excluir-aluno-{{ $aluno->id }}"></x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                {{ $alunos->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
