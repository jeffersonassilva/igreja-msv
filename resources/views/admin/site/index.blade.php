<x-app-layout>
    <x-slot name="header">
        Tela Principal
    </x-slot>

    <section class="pb-6">
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Banners
            </h3>
            <div class="text-rights text-sm">
                @can('adm-adicionar-banner')
                    <x-button.link title="Adicionar" :route="route('banners.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
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
                                <x-button.link title="Editar" :route="route('banners.edit', $banner)"></x-button.link>
                            @endcan

                            @can('adm-excluir-banner')
                                <x-button.delete title="Arquivar" :route="route('banners.destroy', $banner)" formId="form-excluir-banner-{{ $banner->id }}"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
        <x-dialog.confirm message="Você tem certeza que deseja arquivar este banner?"></x-dialog.confirm>
    </section>

    <section class="pb-6">
        <div class="h-[60px] bg-white p-3 rounded-md flex items-center justify-between">
            <h3 class="text-gray-500">
                Lista de Propósitos
            </h3>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($propositos as $proposito)
                <div class="flex flex-col bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200">
                    <h3 class="text-gray-700 font-semibold">{{ $proposito->titulo }}</h3>
                    <p class="flex-1 mt-2 text-sm text-gray-700 text-ellipsis font-thin overflow-hidden line-clamp-4">
                        {{ $proposito->descricao }}
                    </p>
                    @can('adm-editar-proposito')
                        <div class="text-rights text-sm mt-3">
                            <x-button.link title="Editar" :route="route('propositos.edit', $proposito)"></x-button.link>
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
                        <x-button.link title="Editar" :route="route('pastor.edit', $pastor)"></x-button.link>
                    </div>
                @endcan
            </div>
        </div>
    </section>
</x-app-layout>
