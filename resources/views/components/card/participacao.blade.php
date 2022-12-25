@props(['escala'])

<div class="flex flex-col relative bg-white border border-gray-200 p-4 md:px-6 rounded-md">
    <div class="absolute left-[-3px] h-[30px] w-[3px]" style="background: {{ $escala->cor ?? '#ccc' }}"></div>
    <div class="text-gray-700 col-span-2">
        <div class="text-lg mb-1" style="color: {{ $escala->cor ?? '#6b7280' }}">{{ $escala->descricao }}</div>
        <div class="flex gap-1 text-xs font-thin">
            <div class="bg-gray-200 py-1 px-2 rounded-md">{{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }}</div>
            <div class="bg-gray-200 py-1 px-2 rounded-md">{{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h</div>
            <div class="bg-gray-200 py-1 px-2 rounded-md">{{ \Carbon\Carbon::parse($escala->data)->dayName }}</div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-2 mt-6">
        <div class="flex flex-col">
            <div class="font-thin text-xs md:text-sm text-gray-500">Função</div>
            <div class="text-gray-700 text-sm">
                {{ $escala->funcao ? \App\Helpers\Constants::FUNCOES_LISTA[$escala->funcao] : 'Serviços Gerais' }}
            </div>
        </div>
        <div class="flex flex-col items-end">
            <div class="font-thin text-xs md:text-sm text-gray-500">Comparecimento</div>
            <div class="text-gray-700 text-sm">
                @if($escala->comparecimento === 'P')
                    {{ \App\Helpers\Constants::COMPARECIMENTO_LISTA[$escala->comparecimento] }}
                    <span class="inline-block w-[9px] h-[9px] bg-green-400 rounded-full"></span>
                @elseif($escala->comparecimento === 'F')
                    {{ \App\Helpers\Constants::COMPARECIMENTO_LISTA[$escala->comparecimento] }}
                    <span class="inline-block w-[9px] h-[9px] bg-red-600 rounded-full"></span>
                @else
                    {{ \App\Helpers\Constants::COMPARECIMENTO_LISTA[$escala->comparecimento] }}
                    <span class="inline-block w-[9px] h-[9px] bg-yellow-400 rounded-full"></span>
                @endif
            </div>
        </div>
    </div>
    @if($escala->justificativa)
        <div class="flex flex-col mt-4">
            <div class="font-thin text-xs md:text-sm text-gray-500">Justificativa</div>
            <div class="text-gray-700 text-sm">{{ $escala->justificativa }}</div>
        </div>
    @endif
</div>
