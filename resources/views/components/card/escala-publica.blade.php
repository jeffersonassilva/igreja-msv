@props(['escala', 'funcoes'])

<section id="{{ $escala->id }}"
         class="text-gray-600 border-2 rounded-lg flex flex-col relative
         @if($escala->fechada) bg-[#dae8dc] border-[#dae8dd] @else bg-white border-[#efefef] @endif"
    >
    <div class="px-4 sm:px-6 mt-6 relative">
        <div class="absolute left-[-3px] h-full w-[3px]"
             style="background: {{ $escala->fechada ? '#0D9488' : $escala->evento->cor ?? '#777' }}">
        </div>
        <div class="mb-3 text-lg" style="color: {{ $escala->fechada ? '#0D9488' : $escala->evento->cor ?? '#777' }}">
            {{ $escala->evento->descricao }}
        </div>
        <div class="flex items-center">
            <div class="text-6xl font-thin tracking-tighter">
                {{ \Carbon\Carbon::parse($escala->data)->format('d') }}
            </div>
            <div class="flex flex-col pl-4 flex-1">
                <span class="text-sm text-gray-800">
                    {{ \Carbon\Carbon::parse($escala->data)->dayName }}
                </span>
                <span class="text-sm font-thin
                      @if($escala->fechada) text-gray-600 @else text-gray-500 @endif">
                    {{ \Carbon\Carbon::parse($escala->data)->monthName }} de
                    {{ \Carbon\Carbon::parse($escala->data)->format('Y') }}
                </span>
                <span class="text-sm font-thin
                      @if($escala->fechada) text-gray-600 @else text-gray-500 @endif">
                    às {{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h
                </span>
            </div>
        </div>
    </div>
    <div class="p-4 py-6 sm:px-6 flex-1">
        <ul class="text-sm leading-7 font-thin @if($escala->fechada) text-gray-700 @else text-gray-500 @endif">
            @if($escala->evento_id != 1)
                <x-card.escalas.info-adicional
                    :dirigente="$escala->dirigente"
                    :pregador="$escala->pregador"
                    :tema="$escala->tema"
                    :ministro="$escala->ministro"
                    :escalaFechada="$escala->fechada"
                />
            @endif
        </ul>

        @if($escala->dirigente || $escala->pregador || $escala->tema || $escala->ministro)
            <div class="w-8/12 mx-auto my-4">
                <hr class="@if($escala->fechada) border-b border-b-[#add7b3] @else border-b-gray-100 @endif">
            </div>
        @endif

        <ul class="text-sm leading-7 font-thin @if($escala->fechada) text-gray-700 @else text-gray-500 @endif">
            @foreach($escala->voluntarios as $voluntario)
                <x-card.escalas.voluntarios-nomes
                    :loop="$loop"
                    :voluntario="$voluntario"
                    :escala="$escala"
                    :funcoes="$funcoes"
                />
            @endforeach
        </ul>

        @if(!count($escala->voluntarios))
            <div class="flex flex-col justify-center items-center text-gray-400 font-thin text-sm">
                <img width="80%" src="{{ asset('img/precisamos_de_voluntarios.png') }}" alt="Nenhum voluntário">
            </div>
        @endif
    </div>

    {{ $slot }}

    @if($escala->fechada)
        <div class="p-4 sm:px-6 text-sm text-gray-700">
            Todos deverão estar a postos às {{ \Carbon\Carbon::parse($escala->data)->subMinutes(30)->format('H:i') }}h.
        </div>
        <div class="absolute right-2 top-2">
            <span class="font-thin text-xs p-1 uppercase border border-teal-600 rounded-[4px] text-white bg-teal-600">
                fechada
            </span>
        </div>
    @endif
</section>
