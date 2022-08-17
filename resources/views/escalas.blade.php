@extends('layouts.default')

@section('content')

    @if($escalas->count())
        <section class="bg-gray-100">
            <div class="container mx-auto max-w-[1080px] p-4">
                <h1 class="titulo-separador">Escalas</h1>
{{--                <ul class="inline-flex gap-4 mb-8 text-sm font-thin">--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#ff8537] bg-[#ff8537]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Limpeza</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#00d5ff] bg-[#00d5ff]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Culto Público</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#e969ff] bg-[#e969ff]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Culto Das Mulheres</span>--}}
{{--                    </li>--}}
{{--                </ul>--}}

                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 md:grid-cols-3 xl:gap-8 xl:grid-cols-3 mb-8">
                    @foreach($escalas as $escala)
                        <section id="{{ $escala->id }}" class="text-gray-600 bg-white border border-gray-100 rounded-lg shadow-sm flex flex-col">
                            <div class="px-4 sm:px-6 mt-6 relative">
                                <div class="absolute left-[-3px] bg-[{{ $escala->cor_indicacao }}] h-full w-[3px]"></div>
                                <div class="mb-3 text-[{{ $escala->cor_indicacao }}]">{{ $escala->evento->descricao }}</div>
                                <div class="flex items-center">
                                    <div class="text-5xl font-thin tracking-tighter">
                                        {{ \Carbon\Carbon::parse($escala->data)->format('d') }}
                                    </div>
                                    <div class="flex flex-col pl-4 flex-1">
                                        <span class="text-sm"> {{ \Carbon\Carbon::parse($escala->data)->dayName }}</span>
                                        <span class="text-sm font-thin text-gray-400">
                                            {{ \Carbon\Carbon::parse($escala->data)->monthName }}, {{ \Carbon\Carbon::parse($escala->data)->format('Y') }}
                                        </span>
                                        <span class="text-sm font-thin text-gray-400">às {{ \Carbon\Carbon::parse($escala->data)->format('H:i') }}h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 sm:p-6 mt-6 flex-1">
                                @if($escala->evento_id == 1)
                                    <ul class="text-gray-500 text-xs leading-6 font-thin sm:text-sm sm:leading-7">
                                        @foreach($escala->voluntarios as $voluntario)
                                        <li class="line-clamp-1">{{ $voluntario->nome }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if($escala->evento_id != 1)
                                    <ul class="text-gray-500 text-xs leading-6 font-thin sm:text-sm sm:leading-7">
                                        @php
                                            $funcoes = array('CG' => 'Coordenador Geral','R' => 'Recepção','A' => 'Apoio','H' => 'Higienização','SI' => 'Segurança Interna','SE' => 'Segurança Externa');
                                        @endphp
                                        @foreach($escala->voluntarios as $voluntario)
                                            <li class="line-clamp-1">
                                                <span class="{{ $voluntario->funcao ? 'bg-gray-100' : 'border border-dashed border-gray-200' }} font-normal rounded-sm w-[25px] h-[20px] mr-1
                                                         inline-flex items-center justify-center cursor-help select-none"
                                                      title="{{ $voluntario->funcao ? $funcoes[$voluntario->funcao] : 'Função não definida' }}">{!! $voluntario->funcao ?? '&nbsp;' !!}
                                                </span>
                                                {{ $voluntario->nome }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </div>
                            <form role="form" action="{{ route('voluntarios.store') }}" method="post">
                                <div class="px-4 pb-4 flex justify-center items-center gap-1">
                                    <input type="hidden" name="escala_id" value="{{ $escala->id }}">
                                    <input name="nome" type="text" placeholder="Digite seu nome" class="border border-gray-200 rounded-md w-full text-sm font-thin" />
                                    <div class="pl-2 text-2xl">
                                        <button aria-label="Salvar" type="submit" class="flex items-center">
                                            <ion-icon name="add-circle-outline" class="text-gray-400"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container mx-auto max-w-[1080px] pt-4 flex flex-col justify-center items-center">
                <h1 class="titulo-separador">Escalas</h1>
                <div>
                    <img
                        class="w-[200px] md:w-[300px]"
                        src="{{ asset('/img/results-not-found.jpg') }}"
                        alt="sem registros">
                </div>
                <div class="md:text-xl text-neutral-500 py-4 mb-10 md:mb-20">
                    Nenhum registro encontrado!
                </div>
            </div>
        </section>
    @endif
@endsection
