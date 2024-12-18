<x-app-layout>
    <x-slot name="header">
        Membros
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-membro')
                    <x-button.link title="Adicionar Membro" :route="route('membros.create')"></x-button.link>
                @endcan
            </div>
        </div>
        @if(count($membros))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
                @foreach($membros as $membro)
                    <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm
                                dark:bg-[#252c47] dark:border-[#252c47]">

                        <div class="shrink-0">
                            @if($membro->foto)
                                <img src="{{ asset($membro->foto) }}"
                                     alt="avatar"
                                     class="w-12 rounded-full object-cover aspect-square
                                            border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                            @else
                                @if($membro->sexo == 'M')
                                    <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                         alt="avatar"
                                         class="w-12 rounded-full object-cover aspect-square
                                                border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                                @else
                                    <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                         alt="avatar"
                                         class="w-12 rounded-full object-cover aspect-square
                                                border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                                @endif
                            @endif
                        </div>

                        <div class="flex-1">
                            <h3 class="text-gray-700 dark:text-white sm:line-clamp-1">
                                {{ $membro->nome }}
                            </h3>
                            <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6]">
                                {{ $membro->sexo === 'M' ? 'Masculino' : 'Feminino' }}
                            </p>
                        </div>

                        @can('adm-editar-membro')
                            <div class="text-sm flex gap-2 md:gap-2">
                                <x-button.link title=""
                                               class="text-lg py-3"
                                               icon="create-outline"
                                               :lighter="true"
                                               :route="route('membros.edit', $membro)">
                                </x-button.link>
                            </div>
                        @endcan
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                {{ $membros->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
