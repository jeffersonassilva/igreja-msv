@extends('layouts.escalas')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Escalas</h2>
@endsection

@section('content')
    <div class="flex flex-col h-full w-full overflow-hidden md:justify-center lg:container lg:mx-auto">
        <div class="w-full">
            <section class="p-4">
                <div class="flex-1 flex justify-between items-center md:mb-1">
                    <p class="text-sm xs:text-base sm:text-lg text-gray-600 dark:text-[#d0d9e6]
                          tracking-tighter md:text-xl md:font-medium">
                        Próximas escalas de obreiros
                    </p>
                    <p class="text-sm xs:text-base font-thin text-gray-500 dark:text-[#d0d9e6]">
                        <a href="{{ route('escalas.obreiros.list') }}"
                           class="p-2 text-blue-500 flex items-center gap-[2px] tracking-tighter">
                            Ver todas
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </p>
                </div>

                @php
                    $count = 0;
                @endphp
                <div class="bg-gradient-to-r from-slate-200 via-gray-200 to-slate-200
                        rounded-md p-4 md:p-6 flex overflow-x-auto snap-x snap-mandatory w-full gap-4">
                    @forelse($escalasObreiros as $escalaObreiro)
                        <section
                            onclick="window.location.href =
                                '{{ route('escalas.obreiros.list') . '/#' . $escalaObreiro->id }}'"
                            class="flex flex-col text-gray-600 bg-white rounded-md
                                    border border-gray-300 snap-always snap-center cursor-pointer">
                            <div class="relative p-3 md:p-4 w-52 h-full sm:w-64 flex flex-col">
                                <div class="absolute left-[-3px] h-[30px] w-[3px]"
                                     style="background: {{ $escalaObreiro->evento->cor ?? '#777' }}">
                                </div>
                                <div class="mb-3 line-clamp-1"
                                     style="color: {{ $escalaObreiro->evento->cor ?? '#777' }}">
                                    {{ $escalaObreiro->evento->descricao }}
                                </div>
                                <div class="flex items-center flex-1">
                                    <div class="text-4xl sm:text-5xl md:text-6xl font-thin tracking-tighter">
                                        {{ \Carbon\Carbon::parse($escalaObreiro->data)->format('d') }}
                                    </div>
                                    <div class="flex flex-col pl-4 flex-1">
                                        <div class="text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($escalaObreiro->data)->dayName }}
                                        </div>
                                        <div class="text-sm font-thin text-gray-500">
                                            {{ \Carbon\Carbon::parse($escalaObreiro->data)->monthName }} de
                                            {{ \Carbon\Carbon::parse($escalaObreiro->data)->format('Y') }}
                                        </div>
                                        <div class="text-sm font-thin text-gray-500">
                                            às {{ \Carbon\Carbon::parse($escalaObreiro->data)->format('H:i') }}h
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end mt-4">
                                    @php
                                        $voluntariosMaxParaExibir = 5;
                                        $contadorVoluntarios = 0;
                                    @endphp
                                    @if(count($escalaObreiro->voluntarios) > 0)
                                        @foreach($escalaObreiro->voluntarios as $voluntario)
                                            <div class="-ml-1 ring-1 md:ring-2 ring-white rounded-full">
                                                @if($voluntario->voluntario->foto)
                                                    <img src="{{ asset($voluntario->voluntario->foto) }}"
                                                         alt="avatar"
                                                         class="rounded-full w-6 md:w-8 object-cover">
                                                @else
                                                    @if($voluntario->voluntario->sexo == 'M')
                                                        <img src="{{ asset('img/icon_profile_man.jpg') }}"
                                                             alt="avatar"
                                                             class="rounded-full w-6 md:w-8 object-cover">
                                                    @else
                                                        <img src="{{ asset('img/icon_profile_woman.jpg') }}"
                                                             alt="avatar"
                                                             class="rounded-full w-6 md:w-8 object-cover">
                                                    @endif
                                                @endif
                                            </div>
                                            @php
                                                $contadorVoluntarios++;
                                            @endphp

                                            @if($contadorVoluntarios >= $voluntariosMaxParaExibir)
                                                @break
                                            @endif
                                        @endforeach
                                        @if(count($escalaObreiro->voluntarios) > $voluntariosMaxParaExibir)
                                            <div class="flex justify-center items-center text-xs md:text-sm
                                                        -ml-1 w-6 md:w-8 ring-1 md:ring-2 ring-amber-100 rounded-full
                                                        tracking-tighter text-amber-800
                                                        bg-amber-100 object-cover">
                                                +{{ count($escalaObreiro->voluntarios) - $voluntariosMaxParaExibir }}
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-xs text-gray-500 bg-red-50 py-1 rounded-md
                                                    min-w-full text-center">
                                            Aguardando trabalhadores
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                        @php
                            $count++;
                        @endphp

                        @if($count >= 5)
                            @break
                        @endif
                    @empty
                        <div class="flex justify-center items-center h-36 w-full rounded-md p-4
                                bg-gradient-to-r from-red-100 via-red-50 to-amber-50">
                            <div class="text-center font-thin tracking-tighter text-gray-700 text-sm sm:text-lg
                                    flex items-center gap-3 xs:gap-4">
                                <div class="text-4xl xs:text-5xl md:text-6xl text-red-300">
                                    <ion-icon name="alert-circle-outline"></ion-icon>
                                </div>
                                <p>Oops, a lista está vazia.<br>Mas já estamos correndo para preenchê-la!</p>
                            </div>
                        </div>
                    @endforelse
                    @if($count > 0)
                        <section class="md:hidden">&nbsp;</section>
                    @endif
                </div>
            </section>
        </div>

        <div class="w-full">
            @forelse($escalasEBD as $escalaEBD)
                <section class="p-4">
                    <div class="flex-1 flex justify-between items-center md:mb-1">
                        <p class="text-sm xs:text-base sm:text-lg text-gray-600 dark:text-[#d0d9e6]
                              tracking-tighter md:text-xl md:font-medium">
                            Próxima EBD dia {{ \Carbon\Carbon::parse($escalaEBD->data)->format('d/m/Y') }}
                        </p>
                        <p class="text-sm xs:text-base font-thin text-gray-500 dark:text-[#d0d9e6]">
                            <a href="{{ route('escalas.ebd.list') }}"
                               class="p-2 text-blue-500 flex items-center gap-[2px] tracking-tighter">
                                Ver todas
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </a>
                        </p>
                    </div>

                    <div class="bg-gradient-to-r from-slate-200 via-gray-200 to-slate-200
                            rounded-md p-4 md:p-6 flex overflow-x-auto snap-x snap-mandatory w-full gap-4">
                        @foreach($escalaEBD->escalasOrdenadas as $escala)
                            <div class="bg-white rounded-md shadow-md shadow-gray-200
                                    border border-gray-300 snap-always snap-center">
                                <div class="flex p-3 md:p-4 w-52 sm:w-64">
                                    <div class="w-full">
                                        <div class="">
                                            <div class="font-medium sm:text-lg tracking-tighter line-clamp-1
                                            leading-5 sm:leading-5">
                                                {{ $escala->classe->nome }}
                                            </div>
                                            <div class="text-gray-500 text-sm font-thin line-clamp-1">
                                                {{ $escala->classe->faixa_etaria }}&nbsp;
                                            </div>
                                        </div>

                                        <div class="block sm:flex sm:gap-12 md:gap-16 lg:gap-0 lg:justify-between">
                                            <div class="mt-2 sm:mt-3 md:mt-4">
                                                <div class="text-sm font-normal">Professor(a):</div>
                                                <div class="text-gray-500 text-sm font-thin line-clamp-1">
                                                    {{ $escala->professor ? $escala->professor->nome : null }}&nbsp;
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2 sm:mt-3 md:mt-4">
                                            <div class="text-sm font-normal">Tema:</div>
                                            <div class="text-gray-500 text-sm font-thin line-clamp-1">
                                                {{ $escala->tema }}&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    @if($escala->classe && $escala->classe->revista)
                                        <img src="{{ asset($escala->classe->revista) }}" alt="capa da revista"
                                             class="w-[36px] h-[52px]
                                            sm:w-[50px] sm:h-[72px]
                                            md:w-[58px] md:h-[84px]
                                            shadow-md shadow-gray-300">
                                    @else
                                        <img src="{{ asset('img/capa-revista-em-branco.jpg') }}" alt="capa da revista"
                                             class="w-[36px] h-[52px]
                                            sm:w-[50px] sm:h-[72px]
                                            md:w-[58px] md:h-[84px]
                                            shadow-md shadow-gray-300">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <section class="md:hidden">&nbsp;</section>
                    </div>
                </section>
                @break
            @empty
                <section class="p-4">
                    <div class="flex-1 flex justify-between items-center md:mb-1">
                        <p class="text-sm xs:text-base sm:text-lg text-gray-600 dark:text-[#d0d9e6]
                              tracking-tighter md:text-xl md:font-medium">
                            Próxima EBD
                        </p>
                        <p class="text-sm xs:text-base font-thin text-gray-500 dark:text-[#d0d9e6]">
                            <a href="{{ route('escalas.ebd.list') }}"
                               class="p-2 text-blue-500 flex items-center gap-[2px]">
                                Ver todas
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </a>
                        </p>
                    </div>

                    <div class="bg-gray-200 rounded-md p-4 md:p-6 flex overflow-x-auto w-full gap-4">
                        <div class="flex justify-center items-center h-36 w-full rounded-md p-4
                                bg-gradient-to-r from-red-100 via-red-50 to-amber-50">
                            <div class="text-center font-thin tracking-tighter text-gray-700 text-sm sm:text-lg
                                    flex items-center gap-3 xs:gap-4">
                                <div class="text-4xl xs:text-5xl md:text-6xl text-red-300">
                                    <ion-icon name="alert-circle-outline"></ion-icon>
                                </div>
                                <p>A diretoria está em reunião com os professores!
                                    <br>Aguarde só mais um pouquinho.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            @endforelse
        </div>
    </div>
@endsection
