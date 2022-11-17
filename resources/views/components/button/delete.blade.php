@props(['route', 'object', 'title' => 'Excluir', 'icon' => 'trash-outline'])

<form action="{{ route($route, $object) }}" method="POST" class="inline">
    @method('DELETE')
    @csrf
    <button aria-label="{{ $title }}"
            class="outline-0 rounded-md text-blue-400 border border-blue-400
            hover:text-white hover:bg-blue-400
            focus:text-white focus:bg-blue-400
            px-2 py-1 mr-1 inline-flex justify-center items-center">
        <ion-icon name="{{ $icon }}"></ion-icon>
        <span class="ml-1">{{ $title }}</span>
    </button>
</form>
