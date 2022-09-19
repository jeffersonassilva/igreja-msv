<x-app-layout>
    <x-slot name="header">
        Relatório de Voluntários
    </x-slot>

    <div class="p-0 sm:p-4 sm:bg-white sm:rounded-lg">
        <section class="lg:w-1/2">
            <header class="text-sm text-gray-500 bg-white p-4 text-center border border-gray-200 rounded-t-xl">
                Quantidade de vezes em que o voluntário foi escalado.
            </header>
            <div class="bg-gray-200 px-3 py-4 sm:px-6 flex justify-between text-sm sm:text-base uppercase font-medium">
                <div class="flex items-center cursor-pointer btn-order" data-order-name="nome">
                    Nome
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                </div>
                <div class="flex items-center cursor-pointer btn-order" data-order-name="quantidade">
                    Quantidade
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                </div>
            </div>
            @foreach($voluntarios as $voluntario)
            <div class="bg-gray-50 odd:bg-white p-3 sm:p-4 sm:px-6 border-b border-x border-gray-200 flex justify-between items-center @if($loop->last) rounded-b-xl @endif">
                <div class="flex-1">
                    <div class="text-gray-900">
                        {{ $voluntario->nome }}
                    </div>
                    <div class="text-gray-700 font-thin text-sm flex gap-2">
                        @if($voluntario->sexo == 'M')
                            <div class="text-xs">Masculino</div>
                        @else
                            <div class="text-xs">Feminino</div>
                        @endif

                        @if($voluntario->professor_ebd)
                        <span class="text-xs">/</span><div class="text-xs">Professor EBD</div>
                        @endif
                    </div>
                </div>
                <span class="border border-gray-200 block flex justify-center items-center w-8 h-8 rounded-full">
                    {{ $voluntario->quantidade }}
                </span>
            </div>
            @endforeach
        </section>
    </div>
</x-app-layout>
