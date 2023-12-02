@props(['escala', 'funcoes'])

<section id="{{ $escala->id }}"
         class="text-gray-600 border-2 rounded-lg flex flex-col relative
         @if($escala->fechada) bg-[#dae8dc] border-[#dae8dd] @else bg-white border-[#efefef] @endif"
    >
    <div class="px-4 sm:px-6 mt-6 relative">
        <div class="absolute left-[-3px] h-full w-[3px]" style="background: {{ $escala->fechada ? '#0D9488' : $escala->evento->cor ?? '#777' }}"></div>
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
                <span class="text-sm font-thin @if($escala->fechada) text-gray-600 @else text-gray-500 @endif">
                    {{ \Carbon\Carbon::parse($escala->data)->monthName }}, {{ \Carbon\Carbon::parse($escala->data)->format('Y') }}
                </span>
                <span class="text-sm font-thin @if($escala->fechada) text-gray-600 @else text-gray-500 @endif">
                    às {{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h
                </span>
            </div>
        </div>
    </div>
    <div class="p-4 py-6 sm:px-6 flex-1">
        @if($escala->evento_id == 1)
            <ul class="text-sm leading-7 font-thin @if($escala->fechada) text-gray-700 @else text-gray-500 @endif">
                @foreach($escala->voluntarios as $voluntario)
                    <li class="line-clamp-1">
                        <div class="flex items-center">
                            <div class="mx-1">
                                @if($voluntario->voluntario->foto)
                                    <img src="{{ asset($voluntario->voluntario->foto) }}"
                                         alt="avatar" class="w-[30px] h-[30px] rounded-full
                                             object-cover aspect-square p-[1px] border-2
                                             @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                                @else
                                    @if($voluntario->voluntario->sexo == 'M')
                                        <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                             alt="avatar" class="w-[30px] h-[30px] rounded-full
                                                 object-cover aspect-square p-[1px] border-2
                                                 @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                                    @else
                                        <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                             alt="avatar" class="w-[30px] h-[30px] rounded-full
                                                 object-cover aspect-square p-[1px] border-2
                                                 @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                                    @endif
                                @endif
                            </div>
                            {{ $voluntario->voluntario->nome }}
                            @if($voluntario->user_id)
                                <button type="button" class="ml-1"
                                        data-popover-target="popover-created-by-{{ $escala->evento_id . '-' . $voluntario->id }}"
                                        data-popover-trigger="click">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>
                                <div data-popover id="popover-created-by-{{ $escala->evento_id . '-' . $voluntario->id }}" role="tooltip"
                                     class="inline-block absolute invisible z-10 text-sm font-light text-gray-600
                                             bg-amber-100 rounded-lg border border-gray-200 shadow-md opacity-0
                                             transition-opacity duration-300 p-2">
                                    Adicionado pelo administrador
                                    <div data-popper-arrow></div>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        @if($escala->evento_id != 1)
            <ul class="text-sm leading-7 font-thin @if($escala->fechada) text-gray-700 @else text-gray-500 @endif">
                @foreach($escala->voluntarios as $voluntario)
                    <li class="line-clamp-1">
                        <div class="flex items-center">
                            <button class="{{ $voluntario->funcao ? $escala->fechada ? 'bg-[#bbd1bb]' : 'bg-gray-200' : 'border border-dashed border-gray-400' }}
                                    font-normal rounded-sm px-1 h-[25px] mr-1 {{ $escala->evento_id == '10' ? 'w-[35px]' : 'w-[25px]' }}
                                    inline-flex items-center justify-center cursor-help select-none"
                                    data-popover-target="popover-click-{{ $escala->evento_id . '-' . $voluntario->id }}"
                                    data-popover-trigger="click" type="button">
                                {!! $voluntario->funcao ?? '&nbsp;' !!}
                            </button>
                            <div class="flex items-center">
                                <div class="mx-1">
                                    @if($voluntario->voluntario->foto)
                                        <img src="{{ asset($voluntario->voluntario->foto) }}"
                                             alt="avatar" class="w-[30px] h-[30px] rounded-full
                                             object-cover aspect-square p-[1px] border-2
                                             @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                                    @else
                                        @if($voluntario->voluntario->sexo == 'M')
                                            <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                                 alt="avatar" class="w-[30px] h-[30px] rounded-full
                                                 object-cover aspect-square p-[1px] border-2
                                                 @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                                        @else
                                            <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                                 alt="avatar" class="w-[30px] h-[30px] rounded-full
                                                 object-cover aspect-square p-[1px] border-2
                                                 @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                                        @endif
                                    @endif
                                </div>
                                {{ $voluntario->voluntario->nome }}
                                @if($voluntario->user_id)
                                    <button type="button" class="ml-1"
                                            data-popover-target="popover-created-by-{{ $escala->evento_id . '-' . $voluntario->id }}"
                                            data-popover-trigger="click">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <div data-popover id="popover-created-by-{{ $escala->evento_id . '-' . $voluntario->id }}" role="tooltip"
                                         class="inline-block absolute invisible z-10 text-sm font-light text-gray-600
                                         bg-amber-100 rounded-lg border border-gray-200 shadow-md opacity-0
                                         transition-opacity duration-300 p-2">
                                        Adicionado pelo administrador
                                        <div data-popper-arrow></div>
                                    </div>
                                @endif
                            </div>
                            <div data-popover id="popover-click-{{ $escala->evento_id . '-' . $voluntario->id }}" role="tooltip"
                                 class="inline-block absolute invisible z-10 text-sm font-light text-gray-600 bg-amber-100
                                 rounded-lg border border-gray-200 shadow-md opacity-0 transition-opacity duration-300">
                                <div class="p-2">
                                    {{ $voluntario->funcao ? $funcoes[$voluntario->funcao] : 'Função não definida' }}
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

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
