@props([
    'voluntario',
    'escala',
    'funcoes',
    'loop',
    ])

@php
    $classBgAndBorder = $voluntario->funcao
        ? $escala->fechada ? 'bg-[#bbd1bb]' : 'bg-gray-200'
        : 'border border-dashed border-gray-400'
@endphp

<li class="line-clamp-1 @if($loop->first) mt-4 @endif">
    <div class="flex items-center">
        @if($escala->evento_id != 1)
            <button class="{{ $classBgAndBorder }}
             {{ $escala->evento_id == '10' ? 'w-[35px]' : 'w-[25px]' }}
                                    group transition-all hover:w-fit ease-out
                                    font-normal rounded-sm h-[25px] px-2 mr-1
                                    inline-flex items-center justify-center select-none">
                <span class="block group-hover:hidden">{!! $voluntario->funcao ?? '&nbsp;' !!}</span>
                <div class="hidden group-hover:block text-sm whitespace-nowrap">
                    {{ $voluntario->funcao ? $funcoes[$voluntario->funcao] : 'Função não definida' }}
                </div>
            </button>
        @endif
        <div class="flex-1 flex items-center">
            <div class="mx-1 flex-shrink-0">
                @if($voluntario->voluntario->foto)
                    <img src="{{ asset($voluntario->voluntario->foto) }}" alt="avatar"
                         class="w-[30px] h-[30px] rounded-full object-cover aspect-square p-[1px] border-2
                                @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                @else
                    @if($voluntario->voluntario->sexo == 'M')
                        <img src="{{ asset('img/icon_profile_man.jpg') }}" alt="avatar"
                             class="w-[30px] h-[30px] rounded-full object-cover aspect-square p-[1px] border-2
                                    @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                    @else
                        <img src="{{ asset('img/icon_profile_woman.jpg') }}" alt="avatar"
                             class="w-[30px] h-[30px] rounded-full object-cover aspect-square p-[1px] border-2
                                    @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                    @endif
                @endif
            </div>
            <div class="line-clamp-1">
                {{ $voluntario->voluntario->nome }}
            </div>
            @if($voluntario->user_id)
                <button type="button" class="ml-1">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
                <div class="inline-block absolute invisible z-10 text-sm font-light text-gray-600
                            bg-amber-100 rounded-lg border border-gray-200 shadow-md opacity-0
                            transition-opacity duration-300 p-2">
                    Adicionado pelo administrador
                </div>
            @endif
        </div>
    </div>
</li>
