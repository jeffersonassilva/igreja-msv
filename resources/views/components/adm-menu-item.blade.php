@props(['route', 'group', 'icon'])

<a href="@if($route === '#') # @else {{ route($route) }} @endif" class="@if(preg_match('/^admin\/' . $group . '($|\/|\?)/', request()->path())) active @endif
    px-6 lg:w-full h-14 relative text-gray-500
    flex gap-4 md:justify-center lg:justify-start items-center
    hover:text-blue-500 lg:hover:pl-8
    transition-all duration-300 ease-in-out">
    <div class="lg:w-[22px]">
        <ion-icon name="{{ $icon }}"></ion-icon>
    </div>
    <h3 class="md:hidden lg:block text-sm font-medium">{{ $slot }}</h3>
</a>
