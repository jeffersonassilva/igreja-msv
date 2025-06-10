@props([
    'voluntario',
    'escala',
    'loop',
    ])

@php
    $classBgAndBorder = $voluntario->funcao
        ? $escala->fechada ? 'bg-[#bbd1bb]' : 'bg-gray-200'
        : 'border border-dashed border-gray-400'
@endphp

<div class="line-clamp-1">
    <div class="flex items-center">
        <div class="flex-1 flex items-center">
            <div class="mx-1 flex-shrink-0">
                @if($voluntario->voluntario->foto)
                    <img src="{{ asset($voluntario->voluntario->foto) }}" alt="avatar"
                         class="w-8 h-8 rounded-full object-cover aspect-square p-[1px] border-2
                                @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                @else
                    @if($voluntario->voluntario->sexo == 'M')
                        <img src="{{ asset('img/icon_profile_man.jpg') }}" alt="avatar"
                             class="w-8 h-8 rounded-full object-cover aspect-square p-[1px] border-2
                                    @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                    @else
                        <img src="{{ asset('img/icon_profile_woman.jpg') }}" alt="avatar"
                             class="w-8 h-8 rounded-full object-cover aspect-square p-[1px] border-2
                                    @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                    @endif
                @endif
            </div>
            <div class="line-clamp-1">
                {{ $voluntario->voluntario->nome }}
            </div>
        </div>
    </div>
</div>
