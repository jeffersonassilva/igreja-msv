<x-app-layout>
    <x-slot name="header">
        Relatório de Voluntários
    </x-slot>

    <section class="bg-white p-4 sm:rounded-lg">

        <div class="overflow-x-auto relative border border-gray-100 shadow-md sm:rounded-lg lg:w-1/2">
            <table class="w-full text-left text-gray-500">
                <caption class="p-4 border-b text-sm">Quantidade de vezes em que o voluntário foi escalado.</caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                <tr class="text-sm sm:text-base">
                    <th scope="col" class="p-4 sm:px-6 btn-order cursor-pointer" data-order-name="nome">
                        <div class="flex items-center">
                            Nome
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                        </div>
                    </th>
                    <th scope="col" class="p-4 sm:px-6 btn-order cursor-pointer" data-order-name="quantidade">
                        <div class="flex items-center justify-end">
                            Quantidade
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($voluntarios as $voluntario)
                    <tr class="bg-gray-50 odd:bg-white text-sm sm:text-base @if(!$loop->last) border-b @endif">
                        <td class="p-4 sm:px-6 text-gray-900 font-thin">
                            {{ $voluntario->nome }}
                        </td>
                        <td class="p-4 sm:px-6 flex items-end justify-end">
                            <span class="border border-gray-200 block flex justify-center items-center w-8 h-8 rounded-full">
                                {{ $voluntario->quantidade }}
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </section>
</x-app-layout>
