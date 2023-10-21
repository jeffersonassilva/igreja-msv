@props(['title', 'route', 'target' => '_self', 'lighter' => false, 'icon' => null])

<a aria-label="{{ $title }}" href="{{ $route }}" target="{{ $target }}"
    @if($lighter)
        {{ $attributes->merge(['class' => 'outline-0 rounded-md px-3 py-1 inline-flex justify-center items-center text-primary-dark bg-neutral hover:bg-neutral-dark focus:bg-neutral-dark dark:text-[#d0d9e6] dark:bg-[#51596b] dark:hover:bg-[#656b7b]']) }}
    @else
        {{ $attributes->merge(['class' => 'outline-0 rounded-md px-3 py-1 inline-flex justify-center items-center text-white bg-primary hover:bg-primary-dark focus:bg-primary-dark dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300']) }}
    @endif">

    @if($icon)
        <ion-icon name="{{ $icon }}"></ion-icon>
    @endif
    <span>{{ $title }}</span>
</a>
