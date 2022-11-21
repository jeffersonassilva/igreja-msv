@props(['title', 'route', 'lighter' => false, 'icon' => null])

<a aria-label="{{ $title }}" href="{{ $route }}"
    @if($lighter)
        {{ $attributes->merge(['class' => 'outline-0 rounded-md px-3 py-1 inline-flex justify-center items-center text-primary-dark bg-neutral hover:bg-neutral-dark focus:bg-neutral-dark']) }}
    @else
        {{ $attributes->merge(['class' => 'outline-0 rounded-md px-3 py-1 inline-flex justify-center items-center text-white bg-primary hover:bg-primary-dark focus:bg-primary-dark']) }}
    @endif">

    @if($icon)
        <ion-icon name="{{ $icon }}"></ion-icon>
    @endif
    <span>{{ $title }}</span>
</a>
