@props([
    'title' => 'Excluir',
    'route',
    'formId',
    'bg' => 'text-primary-dark bg-neutral hover:bg-neutral-dark focus:bg-neutral-dark
            dark:text-[#d0d9e6] dark:bg-[#51596b] dark:hover:bg-[#656b7b]',
    'icon' => null,
    'dropdown' => false
])

@php
    $class = $attributes->merge(['class' => 'btn-dialog-reset-senha-open outline-0 rounded-md
            px-3 py-1 mr-1 inline-flex justify-center items-center ' . $bg]);

    if ($dropdown) {
        $class = $attributes->merge(['class' => 'flex items-center gap-2 w-full text-left px-4 py-2
            hover:bg-gray-100 dark:hover:bg-gray-700 btn-dialog-reset-senha-open']);
        }
@endphp

<button aria-label="{{ $title }}" type="button" data-form-reference="{{ $formId }}" {{ $class }}>
    @if($icon)
        <ion-icon name="{{ $icon }}"></ion-icon>
    @endif

    <span>{{ $title }}</span>
</button>
