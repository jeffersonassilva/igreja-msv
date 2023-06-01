@props(['title' => 'Excluir', 'route', 'formId'])

<form id="submit-{{ $formId }}" action="{{ $route }}" method="POST" class="inline">
    @method('DELETE')
    @csrf
    <button aria-label="{{ $title }}" type="button" data-form-reference="{{ $formId }}"
            {{ $attributes->merge(['class' => 'btn-dialog-open outline-0 rounded-md
            text-primary-dark bg-neutral hover:bg-neutral-dark focus:bg-neutral-dark
            px-3 py-1 mr-1 inline-flex justify-center items-center
            dark:text-[#d0d9e6] dark:bg-[#51596b] dark:hover:bg-[#656b7b]']) }}>
        <span>{{ $title }}</span>
    </button>
</form>
