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
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
                @foreach($datas as $data)
                    <div class="bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200
                            dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="flex gap-2 items-center">
                            <div>
                                @if($data->classe && $data->classe->revista)
                                    <img src="{{ asset($data->classe->revista) }}" alt="avatar"
                                         class="w-[100px] h-[140px] border-2 border-gray-100
                                                p-[2px] dark:border-[#454b54]">
                                @else
                                    <div class="w-[100px] h-[140px]"></div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="text-gray-700 font-medium dark:text-white line-clamp-1">
                                    {{ \Carbon\Carbon::parse($data->data)->format('d/m/Y') }}
                                </h3>
                                <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6] line-clamp-1">
                                    <span class="font-normal">Classe:</span> {{ $data->classe->nome }}
                                </p>
                                <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    <span class="font-normal">
                                        Professor:
                                    </span> {{ $data->professor ? $data->professor->nome : null }}
                                </p>
                                @if($data->tema)
                                    <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                                        {{ $data->tema }}
                                    </p>
                                @endif
                                @canany(['adm-editar-ebd-calendario', 'adm-excluir-ebd-calendario'])
                                    <div class="text-sm mt-3 flex flex-1 gap-2">
                                        @can('adm-editar-ebd-calendario')
                                            <x-button.link title="Editar"
                                                           :route="route('calendario.edit', $data)"></x-button.link>
                                        @endcan

                                        @can('adm-excluir-ebd-calendario')
                                            <x-button.delete :route="route('calendario.destroy', $data)"
                                                             formId="form-excluir-calendario-{{ $data->id }}">
                                            </x-button.delete>
                                        @endcan
                                    </div>
                                @endcanany
                            </div>
                        </div>
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
