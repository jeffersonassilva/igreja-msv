<x-app-layout>
    <x-slot name="header">
        Detalhar Voluntário
    </x-slot>

    <section class="flex flex-col gap-1">
        <div class="text-gray-400 text-lg font-thin">Informações Gerais</div>

        <div class="bg-white border border-gray-200 rounded-md shadow-sm p-4 md:p-6 mb-6">
            <div class="flex-1">
                <div class="grid gap-4 grid-cols-2 md:grid-cols-4">
                    <div class="flex col-span-2 md:col-span-4 items-center md:items-start">
{{--                        <div class="mr-2 md:mr-8">--}}
{{--                            <img src="https://thumbs.dreamstime.com/b/handsome-man-black-suit-white-shirt-posing-studio-attractive-guy-fashion-hairstyle-confident-man-short-beard-125019349.jpg"--}}
{{--                                 alt="avatar" class="w-[60px] sm:w-[80px] md:w-[100px] rounded-full">--}}
{{--                        </div>--}}
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Nome</div>
                            <div class="text-gray-800 text-xl sm:text-2xl md:text-3xl font-medium sm:font-normal">
                                {{ $data->nome }}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="font-thin text-xs md:text-sm text-gray-500">Sexo</div>
                        <div class="text-gray-800">{{ $data->sexo === 'M' ? 'Masculino' : 'Feminino' }}</div>
                    </div>

                    <div class="flex flex-col">
                        <div class="font-thin text-xs md:text-sm text-gray-500">Professor EBD</div>
                        <div class="text-gray-800">{{ $data->professor_ebd == '1' ? 'Sim' : 'Não' }}</div>
                    </div>

                    @if($data->observacao)
                        <div class="flex flex-col col-span-2">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Observações</div>
                            <div class="text-gray-800">{{ $data->observacao }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <h3 class="text-gray-400 text-lg font-thin">Participações em escalas</h3>

        <div class="flex-1 flex flex-col gap-2 md:gap-4">
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
    </section>
</x-app-layout>
