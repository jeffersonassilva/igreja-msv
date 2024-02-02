<x-app-layout>
    <x-slot name="header">
        EBD - Calendário
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-rights text-sm">
                @can('adm-adicionar-ebd-calendario')
                    <x-button.link title="Adicionar Data" :route="route('calendario.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($datas))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 md:py-3 gap-4">
                @foreach($datas as $data)
                    <div class="bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                        <h3 class="text-gray-700 font-medium dark:text-white line-clamp-1">{{ $data->nome }}</h3>
                        <p class="text-sm mt-1 font-thin text-gray-500 dark:text-[#d0d9e6]">
                            {{ \Carbon\Carbon::parse($data->data)->format('d/m/Y') }}
                        </p>
                        <p class="text-sm mt-1 font-thin text-gray-500 dark:text-[#d0d9e6] line-clamp-1">
                            Classe: {{ $data->classe->nome }}
                        </p>
                        <p class="text-sm mt-1 font-thin text-gray-500 dark:text-[#d0d9e6]">
                            Professor: {{ $data->professor }}
                        </p>
                        @canany(['adm-editar-ebd-aluno', 'adm-excluir-ebd-aluno'])
                            <div class="text-sm mt-3 flex gap-2">
                                @can('adm-editar-ebd-calendario')
                                    <x-button.link title="Editar" :route="route('calendario.edit', $data)"></x-button.link>
                                @endcan

                                @can('adm-excluir-ebd-calendario')
                                    <x-button.delete :route="route('calendario.destroy', $data)" formId="form-excluir-calendario-{{ $data->id }}"></x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                {{ $datas->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>
</x-app-layout>
