<x-app-layout>
    <h2 class="font-thin text-2xl text-gray-500 p-3">
        {{ __('Dashboard') }}
    </h2>

    <div class="grid md:grid-cols-3 2xl:grid-cols-4 p-3 gap-4">
        @foreach($propositos as $proposito)
            <div class="bg-white p-3 shadow-sm rounded-sm border-[1px] border-gray-200">
                <h3 class="text-gray-700 font-semibold">{{ $proposito->titulo }}</h3>
                <p class="mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">{{ $proposito->descricao }}</p>
                <div class="text-rights text-sm mt-3">
                    <a aria-label="Editar" href="{{ route('propositos.edit', $proposito->id) }}"
                       class="outline-0 rounded-md text-blue-400 border border-blue-400
                            hover:text-white hover:bg-blue-400
                            focus:text-white focus:bg-blue-400
                            px-2 py-1 inline-flex justify-center items-center">
                        <ion-icon name="create-outline"></ion-icon><span class="ml-1">Editar</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
