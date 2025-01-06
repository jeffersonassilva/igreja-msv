<x-app-layout>
    <x-slot name="header">
        Calendário Fixo
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-ebd-calendario')
                    <x-button.link title="Adicionar" :route="route('calendario-fixo.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($datas))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
                @foreach($datas as $data)
                    <div class="bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200
                            dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="flex gap-2 items-center">
                            <div class="flex-1">
                                <h3 class="text-gray-700 font-medium dark:text-white line-clamp-1 mb-2">
                                    {{ $data->titulo }}
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
                                    <span class="font-normal">
                                        Tema:
                                    </span> {{ $data->tema }}
                                    </p>
                                @endif
                                @if($data->link)
                                    <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    <span class="font-normal">
                                        Link:
                                    </span> {{ $data->link }}
                                    </p>
                                @endif
                                @if($data->local)
                                    <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    <span class="font-normal">
                                        Local:
                                    </span> {{ $data->local }}
                                    </p>
                                @endif
                                @canany(['adm-editar-ebd-calendario', 'adm-excluir-ebd-calendario'])
                                    <div class="text-sm mt-3 flex flex-1 gap-2">
                                        @can('adm-editar-ebd-calendario')
                                            <x-button.link title="Editar"
                                                           :route="route('calendario-fixo.edit', $data)">
                                            </x-button.link>
                                        @endcan

                                        @can('adm-excluir-ebd-calendario')
                                            <x-button.delete :route="route('calendario-fixo.destroy', $data)"
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
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>
</x-app-layout>
