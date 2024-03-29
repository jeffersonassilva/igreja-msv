@props([
    'label',
    'value',
    'icon',
    'width',
    'escalaFechada',
    ])

<li class="line-clamp-1">
    <div class="flex items-center">
        <button class="{{ $escalaFechada ? 'bg-[#bbd1bb]' : 'bg-gray-200' }} w-[32px]
                                group transition-all hover:w-[{{ $width }}] ease-out
                                text-base rounded-sm h-[25px] mr-1
                                inline-flex items-center justify-center select-none">
            <ion-icon class="block group-hover:hidden" name="{{ $icon }}"></ion-icon>
            <div class="hidden group-hover:block text-sm">{{ $label }}</div>
        </button>
        <div class="mx-1 line-clamp-1">
            {{ $value }}
        </div>
    </div>
</li>
