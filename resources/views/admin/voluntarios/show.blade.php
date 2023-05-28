<x-app-layout>
    <x-slot name="header">
        Detalhar Voluntário
    </x-slot>

    <section class="flex flex-col gap-1 mb-4">
        <div class="text-gray-400 text-lg font-thin">Informações Gerais</div>

        <div class="bg-white border border-gray-200 rounded-md shadow-sm p-4 sm:p-6 lg:p-8 mb-6
                    dark:bg-[#252c47] dark:border-[#252c47]">
            <div class="flex md:flex-row justify-center gap-3 sm:gap-6 md:gap-8">

                <div class="flex justify-start items-center">
                    @if($data->foto)
                        <img src="{{ asset($data->foto) }}"
                             alt="avatar" class="w-[66px] sm:w-[96px] md:w-[126px] lg:w-[200px] rounded-full
                             object-cover aspect-square border-2 border-gray-200 p-[2px] md:p-[3px] dark:border-[#454b54]">
                    @else
                        @if($data->sexo == 'M')
                            <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                 alt="avatar" class="w-[66px] sm:w-[96px] md:w-[126px] lg:w-[200px] rounded-full
                                 object-cover aspect-square border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                        @else
                            <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                 alt="avatar" class="w-[66px] sm:w-[96px] md:w-[126px] lg:w-[200px] rounded-full
                                 object-cover aspect-square border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                        @endif
                    @endif
                </div>

                <div class="flex-1 flex flex-col gap-3 md:gap-4">
                    <div>
                        <div class="font-thin text-xs md:text-sm text-gray-500">Nome</div>
                        <div class="text-gray-800 dark:text-[#d0d9e6] text-xl sm:text-2xl md:text-3xl font-medium sm:font-normal">
                            {{ $data->nome }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-x-2 gap-y-4">
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Sexo</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->sexo === 'M' ? 'Masculino' : 'Feminino' }}</div>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Professor EBD</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->professor_ebd == '1' ? 'Sim' : 'Não' }}</div>
                        </div>

                        <div class="flex flex-col col-span-3 md:col-span-1">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Situação</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->situacao == '1' ? 'Ativo' : 'Inativo' }}</div>
                        </div>
                        @if($data->observacao)
                            <div class="hidden lg:block flex flex-col col-span-3">
                                <div class="font-thin text-xs md:text-sm text-gray-500">Observações</div>
                                <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->observacao }}</div>
                            </div>
                        @endif
                        <div class="hidden lg:block">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Disponibilidade</div>
                            <div class="flex gap-1 mt-1">
                                @foreach($disponibilidades as $disponibilidade)
                                <div class="flex justify-center items-center py-1 px-3 text-sm
                                            border border-gray-300 rounded-md select-none
                                            @if($disponibilidade['checked'])
                                            bg-green-200 text-gray-800 dark:bg-green-600 dark:border-green-600 dark:text-[#d0d9e6]
                                            @else
                                            bg-gray-100 text-gray-400 dark:bg-[#1c2039] dark:border-[#1c2039] dark:text-gray-600
                                            @endif">
{{--                                    <div class="absolute bottom-5 right-[-3px] bg-green-200 w-3 h-3 rounded-full">&nbsp;</div>--}}
                                    <span class="block xl:hidden">
                                        {{ \App\Helpers\Strings::getDiaSemanaAbreviado($disponibilidade['descricao'], 3) }}
                                    </span>
                                    <span class="hidden xl:block">
                                        {{ $disponibilidade['descricao'] }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($data->observacao)
                <div class="lg:hidden flex flex-col mt-4">
                    <div class="font-thin text-xs md:text-sm text-gray-500">Observações</div>
                    <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->observacao }}</div>
                </div>
            @endif
            <div class="lg:hidden mt-4">
                <div class="font-thin text-xs md:text-sm text-gray-500">Disponibilidade</div>
                <div class="flex justify-between gap-1 mt-1">
                    @foreach($disponibilidades as $disponibilidade)
                        <div class="flex justify-center items-center flex-1 p-1 text-xs
                            border border-gray-300 rounded-sm select-none
                            @if($disponibilidade['checked'])
                            bg-green-200 text-gray-800 dark:bg-green-600 dark:border-green-600 dark:text-[#d0d9e6]
                            @else
                            bg-gray-100 text-gray-400 dark:bg-[#1c2039] dark:border-[#1c2039] dark:text-gray-600
                            @endif">
                            <span class="block sm:hidden">
                                {{ \App\Helpers\Strings::getDiaSemanaAbreviado($disponibilidade['descricao'], 3) }}
                            </span>
                            <span class="hidden sm:block">
                                {{ $disponibilidade['descricao'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @if(count($escalas))
        <h3 class="text-gray-400 text-lg font-thin">Participações em escalas</h3>
        <div class="flex-1 grid md:grid-cols-2 2xl:grid-cols-4 gap-3 md:gap-4">
            @foreach($escalas as $escala)
                <x-card.participacao :escala="$escala"></x-card.participacao>
            @endforeach
        </div>
        {{ $escalas->links() }}
        @endif

        <div class="mt-4">
            <a href="{{ route('voluntarios') }}" aria-label="Voltar"
               class="outline-0 rounded-md text-blue-400 font-normal border border-blue-400
                hover:text-white hover:bg-blue-400 focus:text-white focus:bg-blue-400
                px-3 py-1 inline-flex justify-center items-center
                dark:bg-[#1c2039] dark:text-yellow-400 dark:hover:text-yellow-300 dark:border-yellow-400">
                <ion-icon name="arrow-back-outline"></ion-icon><span class="ml-2">Voltar</span>
            </a>
        </div>
    </section>
</x-app-layout>
