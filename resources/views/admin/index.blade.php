<x-app-layout>
    <h2 class="font-thin text-2xl text-gray-500 p-3">
        {{ __('Dashboard') }}
    </h2>

    <div class="mb-5">
        <div class="h-[60px] bg-gray-50 mx-3 p-3 rounded-sm border-[1px] border-gray-200 flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Banners
            </h3>
            <div class="text-rights text-sm">
                <a aria-label="Editar" href="#"
                   class="outline-0 rounded-md text-white border border-blue-400 bg-blue-400
                                hover:bg-blue-500
                                focus:bg-blue-500
                                px-2 py-1 inline-flex justify-center items-center">
                    <ion-icon name="add-circle-outline"></ion-icon><span class="ml-1">Adicionar</span>
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-3 2xl:grid-cols-4 p-3 gap-4">
            @foreach($banners as $banner)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-sm border-[1px] border-gray-200">
                    <img src="{{ asset($banner->img_mobile) }}" alt="banner">
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">{{ $banner->descricao }}</p>
                    <div class="text-rights text-sm mt-3">
                        <a aria-label="Editar" href="{{ route('banners.edit', $banner->id) }}"
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
    </div>

    <div class="mb-5">
        <div class="h-[60px] bg-gray-50 mx-3 p-3 rounded-sm border-[1px] border-gray-200 flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Propósitos
            </h3>
        </div>
        <div class="grid md:grid-cols-3 2xl:grid-cols-4 p-3 gap-4">
            @foreach($propositos as $proposito)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-sm border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-semibold">{{ $proposito->titulo }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">{{ $proposito->descricao }}</p>
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
    </div>
</x-app-layout>
