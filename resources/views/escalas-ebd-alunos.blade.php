@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Escalas EBD</h2>
@endsection

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1080px] 2xl:max-w-[1600px] px-4">
            @if($escala->classe && count($escala->classe->alunos) > 0)
                <div class="flex md:gap-4 bg-white mb-6 sm:mt-4 md:mt-8 md:mb-8">
                    <div class="md:pl-4 flex-shrink-0">
                        @if($escala->classe->revista)
                            <img src="{{ asset($escala->classe->revista) }}" alt="capa da revista"
                                 class="w-[62px] h-[90px] m-2 cursor-pointer
                                    xs:w-[90px] xs:h-[130px] xs:mt-4
                                    sm:w-[120px] sm:h-[175px] sm:mt-[-10px]
                                    md:w-[145px] md:h-[210px] md:mt-[-20px] md:mb-4 rounded-sm md:object-cover
                                    transition-all ease-in-out duration-300 hover:scale-105 shadow-md shadow-gray-300">
                        @else
                            <img src="{{ asset('img/capa-revista-em-branco.jpg') }}" alt="capa da revista"
                                 class="w-[62px] h-[90px] mt-4 cursor-pointer
                                    xs:w-[90px] xs:h-[130px] xs:mt-4
                                    sm:w-[120px] sm:h-[175px] sm:mt-[-10px]
                                    md:w-[145px] md:h-[210px] md:mt-[-20px] md:mb-4 rounded-sm md:object-cover
                                    transition-all ease-in-out duration-300 hover:scale-105 shadow-md shadow-gray-300">
                        @endif
                    </div>
                    <div class="flex flex-col flex-1 p-2 md:p-4">
                        <div class="text-xl xs:text-2xl sm:text-3xl tracking-tighter font-medium">
                            {{ $escala->classe->nome }}
                        </div>
                        <div class="flex-1 xs:text-lg sm:text-xl tracking-tighter">
                            {{ $escala->classe->faixa_etaria }}
                        </div>
                        <div class="font-thin text-sm">
                            <span class="text-base xs:text-lg sm:text-2xl md:text-3xl">
                                {{ count($escala->classe->alunos) }}
                            </span> alunos matriculados
                        </div>
                    </div>
                </div>
                <div class="grid gap-2">
                    @foreach($escala->classe->alunos as $key => $aluno)
                        <div class="bg-white p-4 rounded-sm md:text-lg">{{ ++$key }} - {{ $aluno->nome }}</div>
                    @endforeach
                </div>
            @else
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
            <div class="py-4 text-center mb-8">
                <x-button.link title="Voltar"
                               :route="route('escalas.ebd.list')">
                </x-button.link>
            </div>
        </div>
    </section>
@endsection
