@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Escalas EBD</h2>
@endsection

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1080px] 2xl:max-w-[1600px] p-4">

            @if($escalas->count())
            <div class="grid gap-4 md:gap-6 md:mx-auto md:max-w-3xl lg:max-w-full lg:grid-cols-2 xl:gap-8 2xl:grid-cols-3 mb-8">
                @foreach($escalas as $escala)
                    <x-card.escala-publica-ebd :escala="$escala" />
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
