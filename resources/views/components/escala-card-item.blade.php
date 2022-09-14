@props(['escala'])

<section id="{{ $escala->id }}"
         class="text-gray-600 border rounded-lg shadow-sm flex flex-col relative
         @if($escala->fechada) bg-[#dae8dc] border-gray-200 @else bg-white border-gray-100 @endif"
    >
    <div class="px-4 sm:px-6 mt-6 relative">
        <div class="absolute left-[-3px] h-full w-[3px]" style="background: {{ $escala->fechada ? '#0D9488' : $escala->cor_indicacao }}"></div>
        <div class="mb-3" style="color: {{ $escala->fechada ? '#0D9488' : $escala->cor_indicacao }}">
            {{ $escala->evento->descricao }}
        </div>
        <div class="flex items-center">
            <div class="text-5xl font-thin tracking-tighter">
                {{ \Carbon\Carbon::parse($escala->data)->format('d') }}
            </div>
            <div class="flex flex-col pl-4 flex-1">
                <span class="text-sm @if($escala->fechada) text-gray-800 @endif">
                    {{ \Carbon\Carbon::parse($escala->data)->dayName }}
                </span>
                <span class="text-sm font-thin @if($escala->fechada) text-gray-600 @else text-gray-400 @endif">
                    {{ \Carbon\Carbon::parse($escala->data)->monthName }}, {{ \Carbon\Carbon::parse($escala->data)->format('Y') }}
                </span>
                <span class="text-sm font-thin @if($escala->fechada) text-gray-600 @else text-gray-400 @endif">
                    às {{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h
                </span>
            </div>
        </div>
    </div>
    <div class="p-4 sm:p-6 mt-6 flex-1">
        @if($escala->evento_id == 1)
            <ul class="text-xs leading-6 font-thin sm:text-sm sm:leading-7 @if($escala->fechada) text-gray-700 @else text-gray-500 @endif">
                @foreach($escala->voluntarios as $voluntario)
                    <li class="line-clamp-1">{{ $voluntario->voluntario->nome }}</li>
                @endforeach
            </ul>
        @endif

        @if($escala->evento_id != 1)
            <ul class="text-xs leading-6 font-thin sm:text-sm sm:leading-7 @if($escala->fechada) text-gray-700 @else text-gray-500 @endif">
                @php
                    $funcoes = array('CG' => 'Coordenador Geral','R' => 'Recepção','A' => 'Apoio','H' => 'Higienização','SI' => 'Segurança Interna','SE' => 'Segurança Externa');
                @endphp
                @foreach($escala->voluntarios as $voluntario)
                    <li class="line-clamp-1">
                        <span class="{{ $voluntario->funcao ? $escala->fechada ? 'bg-[#bbd1bb]' : 'bg-gray-100' : 'border border-dashed border-gray-200' }} font-normal rounded-sm w-[25px] h-[20px] mr-1
                                 inline-flex items-center justify-center cursor-help select-none"
                              title="{{ $voluntario->funcao ? $funcoes[$voluntario->funcao] : 'Função não definida' }}">{!! $voluntario->funcao ?? '&nbsp;' !!}
                        </span>
                        {{ $voluntario->voluntario->nome }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{ $slot }}

    @if($escala->fechada)
        <div class="absolute right-2 top-2">
            <span class="font-thin text-xs p-1 uppercase border border-teal-600 rounded-[4px] text-white bg-teal-600">
                fechada
            </span>
        </div>
    @endif
</section>
