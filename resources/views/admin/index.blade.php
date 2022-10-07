<x-app-layout>
    <x-slot name="header">
        Home
    </x-slot>

    <section class="pb-6">
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Banners
            </h3>
            <div class="text-rights text-sm">
                @can('adm-adicionar-banner')
                <a aria-label="Adicionar" href="{{ route('banners.create') }}"
                   class="outline-0 rounded-md text-white border border-blue-400 bg-blue-400
                                hover:bg-blue-500
                                focus:bg-blue-500
                                px-2 py-1 inline-flex justify-center items-center">
                    <ion-icon name="add-circle-outline"></ion-icon><span class="ml-1">Adicionar</span>
                </a>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($banners as $banner)
                <div class="relative flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <span class="absolute top-2 right-2 flex justify-center items-center text-sm bg-yellow-400 rounded-sm w-6 h-6 p-1">{{ $banner->ordem }}</span>
                    <img class="rounded-md" src="{{ asset($banner->img_mobile) }}" alt="banner">
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $banner->descricao }}
                    </p>
                    @canany(['adm-editar-banner', 'adm-excluir-banner'])
                        <div class="text-rights text-sm mt-3">
                            @can('adm-editar-banner')
                                <x-button.edit :route="'banners.edit'" :object="$banner"></x-button.edit>
                            @endcan

                            @can('adm-excluir-banner')
                                <form action="{{ route('banners.destroy', $banner) }}" method="POST" class="inline">
                                    @method('DELETE')
                                    @csrf
                                    <button aria-label="Arquivar"
                                            class="outline-0 rounded-md text-blue-400 border border-blue-400
                                            hover:text-white hover:bg-blue-400 focus:text-white focus:bg-blue-400
                                            px-2 py-1 mr-1 inline-flex justify-center items-center">
                                        <ion-icon name="archive-outline"></ion-icon>
                                        <span class="ml-1">Arquivar</span>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>

    <section class="pb-6">
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Propósitos
            </h3>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($propositos as $proposito)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-semibold">{{ $proposito->titulo }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $proposito->descricao }}
                    </p>
                    @can('adm-editar-proposito')
                    <div class="text-rights text-sm mt-3">
                        <x-button.edit :route="'propositos.edit'" :object="$proposito"></x-button.edit>
                    </div>
                    @endcan
                </div>
            @endforeach
        </div>
    </section>

    <section class="pb-6">
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Pastores
            </h3>
        </div>
        <div class="grid grid-cols-1 py-3 gap-4">
            <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                <h3 class="text-gray-700 font-semibold">{{ $pastor->titulo }}</h3>
                <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                    {{ $pastor->descricao }}
                </p>
                @can('adm-editar-pastor')
                <div class="text-rights text-sm mt-3">
                    <x-button.edit :route="'pastor.edit'" :object="$pastor"></x-button.edit>
                </div>
                @endcan
            </div>
        </div>
    </section>
</x-app-layout>
