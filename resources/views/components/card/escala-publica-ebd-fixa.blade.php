@props(['classe', 'subtitulo', 'professor', 'tema', 'data'])

<div class="flex flex-col bg-white rounded-sm shadow-md shadow-gray-200 my-1 sm:my-4 md:my-4 md:pb-4">
    <div class="flex justify-center items-center bg-red-100 px-4 py-2 tracking-tighter sm:text-lg md:text-xl">
        <ion-icon name="calendar-outline" class="mr-2"></ion-icon> {{ $data }}
    </div>
    <div class="px-4 sm:p-4 md:p-6 md:py-4 w-full my-4">
        <div class="font-medium tracking-tighter sm:text-lg md:text-2xl flex items-center gap-2">
            {{ $classe }}
        </div>

        <div class="mt-2 sm:mt-3 md:mt-4">
            <div class="text-sm font-normal">Professor(a):</div>
            <div class="text-gray-500 text-sm font-thin md:text-ellipsis md:overflow-hidden md:line-clamp-1">
                {{ $professor }}
            </div>
        </div>

        <div class="mt-2 sm:mt-3 md:mt-4">
            <div class="text-sm font-normal">Tema:</div>
            <div class="text-gray-500 text-sm font-thin md:text-ellipsis md:overflow-hidden md:line-clamp-1">
                {{ $tema }}
            </div>
        </div>

        {{ $slot }}
    </div>
</div>
