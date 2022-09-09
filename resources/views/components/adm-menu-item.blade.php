@props(['route', 'icon'])

<a href="@if($route === '#') # @else {{ route($route) }} @endif" class="@if(request()->routeIs($route)) active @endif
    px-6 lg:w-full h-14 relative text-gray-500
    flex gap-4 md:justify-center lg:justify-start items-center
    hover:text-blue-500 lg:hover:pl-8
    transition-all duration-300 ease-in-out">
    <ion-icon name="{{ $icon }}"></ion-icon>
    <h3 class="md:hidden lg:block text-sm font-medium">{{ $slot }}</h3>
</a>
