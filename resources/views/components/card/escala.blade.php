@props(['escala'])

<div class="flex flex-col bg-white text-gray-600 shadow-sm rounded-md border-[1px] border-gray-200 relative">
    <div class="absolute top-4 left-[-3px] h-[30px] w-[3px]"
         style="background: {{ $escala->evento->cor ?? '#777' }}">
    </div>
    <div class="p-4">
        <div class="mb-3 text-lg" style="color: {{ $escala->evento->cor ?? '#777' }}">
            {{ $escala->evento->descricao }}
        </div>
        <div class="flex items-center">
            <div class="text-3xl tracking-tighter">
                {{ \Carbon\Carbon::parse($escala->data)->format('d') }}
            </div>
            <div class="flex flex-col pl-4 flex-1">
                <span class="text-sm @if($escala->fechada) text-gray-800 @endif">
                    {{ \Carbon\Carbon::parse($escala->data)->dayName }}
                </span>
                <span class="text-sm font-thin @if($escala->fechada) text-gray-600 @else text-gray-400 @endif">
                    {{ \Carbon\Carbon::parse($escala->data)->monthName }} de {{ \Carbon\Carbon::parse($escala->data)->format('Y') }} às {{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h
                </span>
            </div>
        </div>
    </div>
    @canany(['adm-editar-escala', 'adm-excluir-escala'])
        <div class="text-sm flex gap-2 border-t border-t-gray-100 px-4 py-3">
            @can('adm-editar-escala')
                <x-button.link title="Editar" :route="route('escalas.edit', $escala)"></x-button.link>
            @endcan

            @can('adm-excluir-escala')
                <x-button.delete :route="route('escalas.destroy', $escala)" formId="form-excluir-escala-{{ $escala->id }}"></x-button.delete>
            @endcan
        </div>
    @endcanany
</div>
