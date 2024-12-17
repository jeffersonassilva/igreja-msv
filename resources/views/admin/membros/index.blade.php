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
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
                @foreach($membros as $membro)
                    <div class="bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200
                                dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="flex gap-2 items-center">
                            <div>
                                @if($membro->foto)
                                    <img src="{{ asset($membro->foto) }}"
                                         alt="avatar"
                                         class="w-[60px] rounded-full object-cover aspect-square border-2
                                                border-gray-100 p-[2px] dark:border-[#454b54]">
                                @else
                                    @if($membro->sexo == 'M')
                                        <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                             alt="avatar"
                                             class="w-[60px] rounded-full object-cover aspect-square border-2
                                                    border-gray-100 p-[2px] dark:border-[#454b54]">
                                    @else
                                        <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                             alt="avatar"
                                             class="w-[60px] rounded-full object-cover aspect-square border-2
                                                    border-gray-100 p-[2px] dark:border-[#454b54]">
                                    @endif
                                @endif
                            </div>
                            <div>
                                <h3 class="text-gray-700 font-medium dark:text-white">{{ $membro->nome }}</h3>
                                <p class="text-sm mt-1 font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    Sexo: {{ $membro->sexo === 'M' ? 'Masculino' : 'Feminino' }}
                                </p>
                            </div>
                        </div>
                        @can('adm-editar-membro')
                            <div class="text-sm mt-3 flex gap-2">
                                <x-button.link title="Editar" :route="route('membros.edit', $membro)"></x-button.link>
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
