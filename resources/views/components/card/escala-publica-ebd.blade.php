@props(['escala'])

<div class="flex flex-col bg-white rounded-sm my-1 px-4 pb-3 sm:my-4 md:my-4 md:px-6 md:pb-4 shadow-md shadow-gray-200">
    <div class="flex relative border-b border-b-gray-200">
        @if($escala->classe && $escala->classe->revista)
            <img src="{{ asset($escala->classe->revista) }}" alt="capa da revista"
                 class="w-[90px] h-[130px] mt-4 cursor-pointer
                        sm:w-[120px] sm:h-[175px] sm:mt-[-10px]
                        md:w-[145px] md:h-[210px] md:mt-[-20px] md:mb-4 rounded-sm md:object-cover
                        transition-all ease-in-out duration-300 hover:scale-105 shadow-md shadow-gray-300">
        @else
            <img src="{{ asset('img/capa-revista-em-branco.jpg') }}" alt="capa da revista"
                 class="w-[90px] h-[130px] mt-4 cursor-pointer
                        sm:w-[120px] sm:h-[175px]
                        md:w-[145px] md:h-[210px] md:mt-[-20px] md:mb-4 rounded-sm md:object-cover
                        transition-all ease-in-out duration-300 hover:scale-105 shadow-md shadow-gray-300">
        @endif

        <div class="relative p-3 sm:p-6 md:p-6 md:py-4 w-full">
            <div class="font-medium tracking-tighter sm:text-lg md:text-2xl flex items-center gap-2">
                {{ $escala->classe->nome }}
                <div class="font-thin text-sm sm:text-base md:text-lg">
                    ({{ \Carbon\Carbon::parse($escala->data)->format('d/m') }})
                </div>
            </div>
            <div class="text-gray-500 text-sm font-thin mt-[-5px] sm:mt-[-4px] md:mt-[-2px]">
                {{ $escala->classe->faixa_etaria }}&nbsp;
            </div>

            <div class="mt-2 sm:mt-3 md:mt-4">
                <div class="text-sm font-normal">Professor(a):</div>
                <div class="text-gray-500 text-sm font-thin md:text-ellipsis md:overflow-hidden md:line-clamp-1">
                    {{ $escala->professor ? $escala->professor->nome : null }}
                </div>
            </div>

            <div class="mt-2 sm:mt-3 md:mt-4">
                <div class="text-sm font-normal">Tema:</div>
                <div class="text-gray-500 text-sm font-thin md:text-ellipsis md:overflow-hidden md:line-clamp-1">
                    {{ $escala->tema }}
                </div>
            </div>
        </div>
    </div>
    <x-tres-alunos :classe="$escala->classe"></x-tres-alunos>
</div>
