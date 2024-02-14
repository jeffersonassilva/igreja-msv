@props(['escala'])

<div class="flex flex-col bg-white rounded-sm my-3 sm:my-4 px-4 pb-4 md:my-4 md:px-6 shadow-md shadow-gray-200">
    <div class="flex relative border-b border-b-gray-200">
        @if($escala->classe && $escala->classe->revista)
            <img src="{{ asset($escala->classe->revista) }}" alt="capa da revista"
                 class="w-[90px] h-[130px] mt-[-10px] cursor-pointer
                        sm:w-[120px] sm:h-[175px]
                        md:w-[145px] md:h-[210px] md:mt-[-20px] md:mb-4 rounded-sm md:object-cover
                        transition-all ease-in-out duration-300 hover:scale-105 shadow-md shadow-gray-300">
        @else
            <img src="{{ asset('img/capa-revista-em-branco.jpg') }}" alt="capa da revista"
                 class="w-[90px] h-[130px] mt-[-10px] cursor-pointer
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
            <div class="text-gray-500 text-sm font-thin tracking-tighter mt-[-5px] sm:mt-[-4px] md:mt-[-2px]">
                11 a 16 anos
            </div>

            <div class="mt-2 md:mt-4">
                <div class="text-sm font-normal leading-3 sm:leading-normal">Professor:</div>
                <div class="text-gray-500 text-sm font-thin">{{ $escala->professor->nome }}</div>
            </div>

            <div class="mt-2 md:mt-4">
                <div class="text-sm font-normal leading-3 sm:leading-normal">Tema:</div>
                <div class="text-gray-500 text-sm font-thin">{{ $escala->tema }}</div>
            </div>
        </div>
    </div>
    <div class="flex items-center mt-3">
        <div>
            <img src="https://randomuser.me/api/portraits/women/{{ rand(1, 50) }}.jpg" alt=""
                 class="rounded-full w-7 border border-white object-cover">
        </div>
        <div class="ml-[-10px]">
            <img src="https://randomuser.me/api/portraits/men/{{ rand(1, 50) }}.jpg" alt=""
                 class="rounded-full w-7 border border-white object-cover">
        </div>
        <div class="ml-[-10px]">
            <img src="https://randomuser.me/api/portraits/women/{{ rand(1, 50) }}.jpg" alt=""
                 class="rounded-full w-7 border border-white object-cover">
        </div>
        <div class="text-sm ml-4 font-thin">
            <span class="font-normal">{{ rand(10, 50) }} alunos</span>
            <span class="text-gray-500">matriculados.</span>
        </div>
    </div>
</div>
