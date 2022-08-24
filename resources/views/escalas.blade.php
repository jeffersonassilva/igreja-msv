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
{{--                        <span class="pl-1 text-gray-500">Culto de Mulheres</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#355bf0] bg-[#355bf0]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Culto de Imersão</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#42cb82] bg-[#42cb82]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">EBD</span>--}}
{{--                    </li>--}}
{{--                </ul>--}}

                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 md:grid-cols-3 xl:gap-8 xl:grid-cols-3 mb-8">
                    @foreach($escalas as $escala)
                        <x-escala-card-item :escala="$escala">
                            @if(!$escala->fechada)
                            <form role="form" action="{{ route('escalaVoluntario.new') }}" method="post">
                                <div class="px-4 pb-4 flex justify-center items-center gap-1">
                                    <input type="hidden" name="escala_id" value="{{ $escala->id }}">
                                    <input name="nome" list="nome" autocomplete="off" type="text" placeholder="Digite seu nome" class="border border-gray-200 rounded-md w-full text-sm font-thin" />

                                    <datalist id="nome">
                                        @foreach($voluntarios as $voluntarioItem)
                                            <option value="{{ $voluntarioItem->nome }}">
                                        @endforeach
                                    </datalist>

                                    <div class="pl-2 text-2xl">
                                        <button aria-label="Salvar" type="submit" class="flex items-center">
                                            <ion-icon name="add-circle-outline" class="text-gray-400"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </x-escala-card-item>
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
