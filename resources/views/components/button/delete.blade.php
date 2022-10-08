@props(['title' => 'Excluir', 'route'])

<form action="{{ $route }}" method="POST" class="inline">
    @method('DELETE')
    @csrf
    <button aria-label="{{ $title }}"
            class="outline-0 rounded-md
            text-primary-dark bg-neutral hover:bg-neutral-dark focus:bg-neutral-dark
            px-3 py-1 mr-1 inline-flex justify-center items-center">
        <span>{{ $title }}</span>
    </button>
</form>
