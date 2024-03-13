@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Escalas EBD</h2>
@endsection

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1080px] 2xl:max-w-[1600px] p-4">

            @if($aulasDinamicas->count() + $aulasPermanentes->count())
                <div class="grid gap-2 md:gap-6 md:mx-auto md:max-w-3xl mb-8
                        lg:max-w-full lg:grid-cols-2 xl:gap-8 2xl:grid-cols-3">

                    @foreach($aulasPermanentes as $aulaPermanente)
                        <x-card.escala-publica-ebd-fixa
                            :classe="$aulaPermanente->classe->nome"
                            :subtitulo="$aulaPermanente->classe->faixa_etaria"
                            :professor="$aulaPermanente->professor->nome"
                            :tema="$aulaPermanente->tema"
                            :data="$aulaPermanente->titulo"
                        >
                            @if($aulaPermanente->link)
                                <div class="mt-2 sm:mt-3 md:mt-4">
                                    <div class="text-sm font-normal">Link:</div>
                                    <div class="text-gray-500 text-sm font-thin">
                                        <a href="#" class="text-blue-600">{{ $aulaPermanente->link }}</a>
                                    </div>
                                </div>
                            @endif

                            @if($aulaPermanente->local)
                                <div class="mt-2 sm:mt-3 md:mt-4">
                                    <div class="text-sm font-normal">Local:</div>
                                    <div class="text-gray-500 text-sm font-thin">
                                        {{ $aulaPermanente->local }}
                                    </div>
                                </div>
                            @endif
                        </x-card.escala-publica-ebd-fixa>
                    @endforeach


                    @php
                        $dataRef = '';
                    @endphp
                    @foreach($aulasDinamicas as $aulaDinamica)
                        @if($aulaDinamica->data != $dataRef)
                            @if(!$loop->first || $aulasPermanentes->count())
                                <hr class="bg-white lg:col-span-2 2xl:col-span-3 border-t-gray-300 w-4/5 mx-auto mt-8">
                            @endif
                            <div class="text-lg text-gray-700 p-4 lg:col-span-2 2xl:col-span-3
                                    text-center tracking-tighter md:text-2xl">
                                {{ \App\Helpers\Strings::dataPorExtenso($aulaDinamica->data) }}
                            </div>
                        @endif
                        <x-card.escala-publica-ebd :escala="$aulaDinamica"/>
                        @php
                            $dataRef = $aulaDinamica->data
                        @endphp
                    @endforeach
                </div>
            @endif
        </div>

        @if(!$aulasDinamicas->count())
            <div class="container mx-auto max-w-[1080px] pt-4 flex flex-col justify-center items-center">
                <div>
                    <img
                        class="w-[200px] md:w-[300px]"
                        src="{{ asset('/img/results-not-found.png') }}"
                        alt="sem registros">
                </div>
                <div class="md:text-xl text-neutral-500 py-4 mb-10 md:mb-20">
                    Nenhum registro encontrado!
                </div>
            </div>
        @endif

    </section>
@endsection
