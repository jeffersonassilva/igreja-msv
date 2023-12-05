<x-app-layout>
    <x-slot name="header">
        Visitantes
    </x-slot>

    <section>
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">&nbsp;</div>
        </div>
        @if(count($visitantes))
            <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
                @foreach($visitantes as $visitante)
                    <div class="bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200 dark:bg-[#252c47] dark:border-[#252c47]">
                        <div class="flex gap-2 items-center">
                            <div>
                                @if($visitante->sexo == 'M')
                                    <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                         alt="avatar" class="w-[60px] rounded-full object-cover aspect-square border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                                @else
                                    <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                         alt="avatar" class="w-[60px] rounded-full object-cover aspect-square border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                                @endif
                            </div>
                            <div>
                                <h3 class="text-gray-700 font-medium dark:text-white">{{ $visitante->nome }}</h3>
                                <p class="text-sm mt-1 font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    Visitou em: {{ \Carbon\Carbon::parse($visitante->dt_visita)->format('d/m/Y') }}
                                </p>
                                <p class="text-sm mt-1 font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    Telefone: {{ $visitante->telefone }} @if($visitante->telefone && $visitante->whatsapp)<span class="ml-1 text-green-500"><ion-icon name="logo-whatsapp"></ion-icon></span>@endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                {{ $visitantes->links() }}
            </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

</x-app-layout>
