@props(['route', 'object', 'title' => 'Excluir'])

<form action="{{ route($route, $object) }}" method="POST" class="inline">
    @method('DELETE')
    @csrf
    <button aria-label="{{ $title }}"
            class="outline-0 rounded-md text-blue-500 bg-gray-200
            hover:bg-gray-300 focus:bg-gray-300
            px-2 py-1 mr-1 inline-flex justify-center items-center">
        <span class="ml-1">{{ $title }}</span>
    </button>
</form>
