@props(['route', 'icon'])

<li class="border-l-4 hover:bg-gray-50 @if(request()->routeIs($route)) border-blue-400 @else border-white @endif">
    <a class="flex p-4 text-[18px]" href="{{ route($route) }}">
        <ion-icon name="{{ $icon }}" class="@if(request()->routeIs($route)) text-blue-400 @else text-gray-500 @endif"></ion-icon>
        <span class="text-sm px-2 flex items-center @if(request()->routeIs($route)) text-blue-400 @else text-gray-700 @endif">
            {{ $slot }}
        </span>
    </a>
</li>
