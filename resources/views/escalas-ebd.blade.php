@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Escalas EBD</h2>
@endsection

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1080px] 2xl:max-w-[1600px] p-4">

            @if($escalas->count())
            <div class="grid gap-2 md:gap-6 md:mx-auto md:max-w-3xl mb-8
                        lg:max-w-full lg:grid-cols-2 xl:gap-8 2xl:grid-cols-3">
                @php
                    $dataRef = '';
                @endphp
                @foreach($escalas as $escala)
                    @if($escala->data != $dataRef)
                        @if(!$loop->first)
                            <hr class="bg-white lg:col-span-2 2xl:col-span-3 border-t-gray-300 w-4/5 mx-auto mt-8">
                        @endif
                        <div class="text-lg text-gray-700 p-4 lg:col-span-2 2xl:col-span-3
                                    text-center tracking-tighter md:text-2xl">
                            {{ \App\Helpers\Strings::dataPorExtenso($escala->data) }}
                        </div>
                    @endif
                    <x-card.escala-publica-ebd :escala="$escala" />
                    @php
                        $dataRef = $escala->data
                    @endphp
                @endforeach
            </div>
            @endif
        </div>

        @if(!$escalas->count())
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
