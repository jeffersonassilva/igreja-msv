@props(['escalas'])

@foreach($escalas as $escala)
    <div id="div-card-{{ $escala->id }}" class="bg-white rounded-sm my-1 px-4 pb-3
                sm:my-4 md:my-4 md:px-6 md:pb-4 shadow-md shadow-gray-200">
        <div class="flex relative border-b border-b-gray-200">
            @if($escala->classe && $escala->classe->revista)
                <img src="{{ asset($escala->classe->revista) }}" alt="capa da revista"
                     class="w-[62px] h-[90px] mt-4 cursor-pointer
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

            <div class="relative py-3 pl-3 sm:py-6 sm:pl-6 md:p-6 md:py-4 w-full">
                <div class="">
                    <div class="font-medium tracking-tighter sm:text-lg md:text-2xl">
                        {{ $escala->classe->nome }}
                    </div>
                    <div class="text-gray-500 text-sm font-thin mt-[-3px] text-ellipsis overflow-hidden line-clamp-1">
                        {{ $escala->classe->faixa_etaria }}&nbsp;
                    </div>
                </div>

                <div class="block sm:flex sm:gap-12 md:gap-16 lg:gap-0 lg:justify-between">
                    <div class="mt-2 sm:mt-3 md:mt-4">
                        <div class="text-sm font-normal">Professor(a):</div>
                        <div class="text-gray-500 text-sm font-thin md:text-ellipsis
                                    md:overflow-hidden md:line-clamp-1">
                            {{ $escala->professor ? $escala->professor->nome : null }}&nbsp;
                        </div>
                    </div>

                    @if($escala->monitor)
                        <div class="mt-2 sm:mt-3 md:mt-4">
                            <div class="text-sm font-normal">Monitor(a):</div>
                            <div class="text-gray-500 text-sm font-thin md:text-ellipsis
                                            md:overflow-hidden md:line-clamp-1">
                                {{ $escala->monitor }}&nbsp;
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mt-2 sm:mt-3 md:mt-4">
                    <div class="text-sm font-normal">Tema:</div>
                    <div class="text-gray-500 text-sm font-thin md:text-ellipsis md:overflow-hidden md:line-clamp-1">
                        {{ $escala->tema }}&nbsp;
                    </div>
                </div>
            </div>
        </div>
        <x-alunos-matriculados :id="$escala->id" :classe="$escala->classe"></x-alunos-matriculados>
    </div>
@endforeach
