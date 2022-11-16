<form action="{{ route($route, $object) }}" method="POST" class="inline">
    @method('DELETE')
    @csrf
    <button aria-label="Excluir"
            class="outline-0 rounded-md text-blue-400 border border-blue-400
            hover:text-white hover:bg-blue-400
            focus:text-white focus:bg-blue-400
            px-2 py-1 mr-1 inline-flex justify-center items-center">
        <ion-icon name="trash-outline"></ion-icon>
        <span class="ml-1">Excluir</span>
    </button>
</form>
