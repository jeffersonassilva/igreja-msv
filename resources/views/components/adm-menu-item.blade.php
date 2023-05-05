@props(['route', 'group', 'icon'])

<a href="@if($route === '#') # @else {{ route($route) }} @endif" class="@if(preg_match('/^admin\/' . $group . '($|\/|\?)/', request()->path())) active @endif
    border-t border-t-gray-100 px-2 lg:w-full h-14 relative text-gray-500
    flex gap-4 items-center lg:hover:pl-3
    transition-all duration-300 ease-in-out">
    <div class="lg:w-[22px]">
        <ion-icon name="{{ $icon }}"></ion-icon>
    </div>
    <h3 class="text-sm font-medium">{{ $slot }}</h3>
</a>
