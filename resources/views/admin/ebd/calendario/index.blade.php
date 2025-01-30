<x-app-layout>
    <x-slot name="header">
        EBD - Calendário
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-ebd-calendario')
                    <x-button.link title="Adicionar Data" :route="route('calendario.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($datas))
            <div class="flex flex-col gap-4">
                @foreach($datas as $data)
                    <div class="bg-white rounded-sm dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="bg-white dark:bg-[#252c47] p-4 border-b border-gray-200 dark:border-gray-600
                                    flex flex-row gap-2 items-center">
                            <div class="flex-1">
                                <h3 class="sm:hidden text-gray-700 text-lg md:text-2xl font-normal dark:text-white">
                                    {{ \Carbon\Carbon::parse($data->data)->format('d/m/Y') }}
                                </h3>
                                <h3 class="hidden sm:block text-gray-700 md:text-2xl font-normal dark:text-white">
                                    {{ \App\Helpers\Strings::dataPorExtenso(
                                        \Carbon\Carbon::parse($data->data)->format('Y-m-d')
                                    ) }}
                                </h3>
                                <p class="text-base sm:text-lg text-gray-600 dark:text-[#d0d9e6] line-clamp-1">
                                    {{ $data->responsavel }}
                                </p>
                                <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6] line-clamp-1">
                                    {{ $data->secretario }}
                                </p>
                            </div>

                            @canany(['adm-editar-ebd-calendario', 'adm-excluir-ebd-calendario'])
                                <div class="text-sm flex gap-2 md:gap-2">
                                    @can('adm-editar-ebd-calendario')
                                        <x-button.link title=""
                                                       class="text-lg py-3"
                                                       icon="create-outline"
                                                       :lighter="true"
                                                       :route="route('calendario.edit', $data)">
                                        </x-button.link>
                                    @endcan

                                    @can('adm-excluir-ebd-calendario')
                                        <x-button.delete title=""
                                                         icon="trash-outline"
                                                         class="text-lg text-red-500 py-3"
                                                         :route="route('calendario.destroy', $data)"
                                                         formId="form-excluir-calendario-{{ $data->id }}">
                                        </x-button.delete>
                                    @endcan
                                </div>
                            @endcanany
                        </div>

                        <div class="bg-white dark:bg-[#252c47] p-4 flex overflow-x-auto w-full gap-4">
                            @foreach($data->escalasOrdenadas as $escala)
                                <div class="flex flex-col items-center flex-shrink-0 w-[80px] sm:w-fit">
                                    @if($escala->classe && $escala->classe->revista)
                                        <img src="{{ asset($escala->classe->revista) }}" alt="avatar"
                                             class="w-[75px] h-[105px] sm:w-[100px] sm:h-[140px]
                                                    border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                                    @else
                                        <img src="{{ asset('img/capa-revista-em-branco.jpg') }}" alt="avatar"
                                             class="w-[75px] h-[105px] sm:w-[100px] sm:h-[140px]
                                                    border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                                    @endif

                                    <div class="flex-1 flex flex-col items-center w-full">
                                        <p class="text-sm font-thin text-gray-500
                                                  dark:text-[#d0d9e6] line-clamp-1">
                                            {{ $escala->classe->nome }}
                                        </p>
                                        @canany(['adm-editar-ebd-calendario'])
                                            <div class="text-sm mt-3 flex flex-1 gap-2">
                                                @can('adm-editar-ebd-calendario')
                                                    <x-button.link title="Editar"
                                                                   :lighter="true"
                                                                   :route="route(
                                                                        'calendario.escala.edit', [$data, $escala]
                                                                    )">
                                                    </x-button.link>
                                                @endcan
                                            </div>
                                        @endcanany
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>
</x-app-layout>
