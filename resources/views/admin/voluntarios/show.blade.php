<x-app-layout>
    <x-slot name="header">
        Detalhar Voluntário
    </x-slot>

    <section class="flex flex-col gap-1 mb-4">
        <div class="text-gray-400 text-lg font-thin">Informações Gerais</div>

        <div class="bg-white border border-gray-200 rounded-md shadow-sm p-4 sm:p-6 lg:p-8 mb-6">
            <div class="flex justify-center gap-3 sm:gap-6 md:gap-8">
                <div class="flex justify-center items-center sm:block">
                    @if($data->foto)
                        <img src="{{ asset($data->foto) }}"
                             alt="avatar" class="w-[60px] sm:w-[86px] md:w-[106px] rounded-full object-cover aspect-square border-2 border-gray-200 p-[2px] md:p-[3px]">
                    @else
                        @if($data->sexo == 'M')
                            <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                 alt="avatar" class="w-[66px] sm:w-[86px] md:w-[106px] rounded-full object-cover aspect-square border-2 border-gray-100 p-[2px]">
                        @else
                            <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                 alt="avatar" class="w-[66px] sm:w-[86px] md:w-[106px] rounded-full object-cover aspect-square border-2 border-gray-100 p-[2px]">
                        @endif
                    @endif
                </div>
                <div class="flex-1 flex flex-col gap-3 md:gap-4">
                    <div>
                        <div class="font-thin text-xs md:text-sm text-gray-500">Nome</div>
                        <div class="text-gray-800 text-xl sm:text-2xl md:text-3xl font-medium sm:font-normal">
                            {{ $data->nome }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-x-2 gap-y-4">
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Sexo</div>
                            <div class="text-gray-800">{{ $data->sexo === 'M' ? 'Masculino' : 'Feminino' }}</div>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Professor EBD</div>
                            <div class="text-gray-800">{{ $data->professor_ebd == '1' ? 'Sim' : 'Não' }}</div>
                        </div>
                        @if($data->observacao)
                            <div class="flex flex-col col-span-2 hidden sm:block">
                                <div class="font-thin text-xs md:text-sm text-gray-500">Observações</div>
                                <div class="text-gray-800">{{ $data->observacao }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if($data->observacao)
                <div class="flex flex-col mt-4 sm:hidden">
                    <div class="font-thin text-xs md:text-sm text-gray-500">Observações</div>
                    <div class="text-gray-800">{{ $data->observacao }}</div>
                </div>
            @endif
        </div>

        @if(count($escalas))
        <h3 class="text-gray-400 text-lg font-thin">Participações em escalas</h3>
        <div class="flex-1 grid lg:grid-cols-2 2xl:grid-cols-3 gap-2 md:gap-4">
            @foreach($escalas as $escala)
                <div class="flex flex-col relative bg-white border border-gray-200 p-4 md:px-6 rounded-md">
                    <div class="absolute left-[-3px] h-[25px] w-[3px]" style="background: {{ $escala->cor_indicacao }}"></div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-gray-700 font-medium md:text-xl col-span-2" style="color: {{ $escala->cor_indicacao }}">
                            {{ $escala->descricao }}
                        </div>
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Data</div>
                            <div class="text-gray-700 text-sm">{{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }}</div>
                        </div>
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Hora</div>
                            <div class="text-gray-700 text-sm">{{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}</div>
                        </div>
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Função</div>
                            <div class="text-gray-700 text-sm">{{ $escala->funcao ?  \App\Helpers\Constants::FUNCOES_LISTA[$escala->funcao] : 'Serviços Gerais' }}</div>
                        </div>
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Comparecimento</div>
                            <div class="text-gray-700 text-sm">{{ \App\Helpers\Constants::COMPARECIMENTO_LISTA[$escala->comparecimento] }}</div>
                        </div>
                        @if($escala->justificativa)
                        <div class="flex flex-col col-span-2">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Justificativa</div>
                            <div class="text-gray-700 text-sm">{{ $escala->justificativa }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        {{ $escalas->links() }}
        @endif

        <div class="mt-4">
            <a href="{{ route('voluntarios') }}" aria-label="Voltar"
               class="outline-0 rounded-md text-blue-400 font-normal border border-blue-400
                                    hover:text-white hover:bg-blue-400
                                    focus:text-white focus:bg-blue-400
                                    px-3 py-1 inline-flex justify-center items-center">
                <ion-icon name="arrow-back-outline"></ion-icon><span class="ml-2">Voltar</span>
            </a>
        </div>
    </section>
</x-app-layout>
