@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Escalas EBD</h2>
@endsection

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1080px] 2xl:max-w-[1600px] p-4">

            @if($aulasDinamicas->count() + $aulasPermanentes->count())

                <div class="grid gap-4 sm:gap-6 xl:gap-8 lg:grid-cols-2 2xl:grid-cols-3">
                    @foreach($aulasPermanentes as $aulaPermanente)
                        <x-card.escala-publica-ebd-fixa
                            :classe="$aulaPermanente->classe->nome"
                            :professor="$aulaPermanente->professor->nome"
                            :tema="$aulaPermanente->tema"
                            :data="$aulaPermanente->titulo"
                        >
                            @if($aulaPermanente->local)
                                <div class="mt-2 sm:mt-3 md:mt-4">
                                    <div class="text-sm font-normal">Local:</div>
                                    <div class="text-gray-500 text-sm font-thin">
                                        {{ $aulaPermanente->local }}
                                    </div>
                                </div>
                            @endif

                            @if($aulaPermanente->link)
                                <div class="mt-2 sm:mt-3 md:mt-4">
                                    <div class="text-sm font-normal">Link:</div>
                                    <div class="text-gray-500 text-sm font-thin">
                                        <a href="#" class="text-blue-600">{{ $aulaPermanente->link }}</a>
                                    </div>
                                </div>
                            @endif
                        </x-card.escala-publica-ebd-fixa>
                    @endforeach
                </div>


                @foreach($aulasDinamicas as $aulaDinamica)
                    <hr class="bg-white lg:col-span-2 2xl:col-span-3 border-t-gray-300 w-4/5 mx-auto mt-12 md:mt-16">
                    <div class="text-2xl sm:text-3xl md:text-4xl
                                text-gray-700 lg:col-span-2 2xl:col-span-3
                                text-center tracking-tighter my-8 md:my-14">
                        {{ \App\Helpers\Strings::dataPorExtenso($aulaDinamica->data) }}
                        <div class="font-thin text-sm md:text-base flex flex-col gap-1 md:gap-2
                                    items-center justify-center mt-4">
                            <div class="flex tracking-tighter">
                                <div class="inline-block px-2 bg-gray-200">Responsável:</div>
                                <div class="inline-block px-2 bg-white border border-gray-300">
                                    {{ $aulaDinamica->responsavel ?? 'Não definido' }}
                                </div>
                            </div>
                            <div class="flex tracking-tighter">
                                <div class="inline-block px-2 bg-gray-200">Secretaria:</div>
                                <div class="inline-block px-2 bg-white border border-gray-300">
                                    {{ $aulaDinamica->secretario ?? 'Não definido' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-2 lg:gap-6 xl:gap-8 lg:grid-cols-2 2xl:grid-cols-3">
                        <x-card.escala-publica-ebd :escalas="$aulaDinamica->escalasOrdenadas"/>
                    </div>
                @endforeach

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
