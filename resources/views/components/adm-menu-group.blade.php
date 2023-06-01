@props(['name', 'id', 'icon', 'groups', 'submenus'])

@php
    $hasActiveGroup = false;
    foreach ($groups as $group) {
      if (preg_match('/^admin\/' . $group . '($|\/|\?)/', request()->path())) {
        $hasActiveGroup = true;
        break;
      }
    }
@endphp

<a href="#" class="border-t border-t-gray-100
        px-2 lg:w-full h-14 relative text-gray-500
        flex gap-3 md:justify-center lg:justify-start items-center
        lg:hover:pl-3 dark:border-t-[#263141] dark:text-[#d0d9e6]
        transition-[padding] duration-300 ease-in-out"
   onclick="toggleSubmenu(event, '{{ $id }}')">
    <div class="lg:w-[22px]">
        <ion-icon name="{{ $icon }}"></ion-icon>
    </div>
    <h3 class="text-sm font-medium flex-1">
        {{ $name }}
    </h3>
    <ion-icon name="caret-down-outline" role="img" class="md hydrated" style="font-size: 12px;"
              aria-label="document text outline">
    </ion-icon>
</a>
<div id="{{ $id }}" class="submenu @if ($hasActiveGroup) block @else hidden @endif">
    <ul class="list-none">
        @foreach ($submenus as $submenu)
            @can($submenu['permission'])
                <li>
                    <a class="@if(preg_match('/^admin\/' . $submenu['route'] . '($|\/|\?)/', request()->path())) text-blue-500 dark:text-yellow-400 @endif
                       px-5 lg:px-4 lg:w-full h-12 relative text-gray-500
                       flex gap-1 items-center lg:hover:pl-5 dark:text-[#d0d9e6]
                       transition-[padding] duration-300 ease-in-out"
                       href="@if($submenu['route'] === '#') # @else {{ route($submenu['route']) }} @endif">
                        <div class="lg:w-[22px] text-gray-300 dark:text-[#40465f]">└</div>
                        <h3 class="pl-1 text-sm font-medium">{{ $submenu['label'] }}</h3>
                    </a>
                </li>
            @endcan
        @endforeach
    </ul>
</div>
