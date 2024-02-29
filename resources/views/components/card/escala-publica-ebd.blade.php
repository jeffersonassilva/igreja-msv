@props(['escala'])

<section id="{{ $escala->id }}"
         class="text-gray-600 border-2 rounded-lg flex flex-col relative bg-white border-[#efefef]">
    <div class="px-4 sm:px-6 my-6 relative">
        <div class="absolute left-[-3px] top-[50px] h-[120px] w-[3px] bg-gray-300"></div>
        <div class="mb-3 text-lg">{{ $escala->classe->nome }}</div>
        <div class="flex">
            <div class="text-6xl font-thin tracking-tighter">
                @if($escala->classe && $escala->classe->revista)
                    <img src="{{ asset($escala->classe->revista) }}" alt="avatar"
                         class="w-[100px] h-[140px] border-2 border-gray-100 p-[2px] dark:border-[#454b54]">
                @else
                    <div class="w-[100px] h-[140px] bg-gray-200"></div>
                @endif
            </div>
            <div class="flex flex-col pl-4 flex-1">
                <span class="text-sm text-gray-800">
                    {{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }}
                </span>
                <span class="text-sm font-thin">
                    às 09:00h
                </span>
                <div class="mt-4">
                    <div class="text-sm font-normal">
                        Professor:
                    </div>
                    <div class="text-sm font-thin text-gray-500">
                        {{ $escala->professor ? $escala->professor->nome : null }}
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-sm font-normal">
                        Tema:
                    </div>
                    <div class="text-sm font-thin text-gray-500">
                        {{ $escala->tema }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $slot }}

</section>
