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
                    <th class="p-4 sm:px-6">Nome</th>
                    <th class="p-4 sm:px-6 text-right">Quantidade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($voluntarios as $voluntario)
                    <tr class="bg-gray-50 odd:bg-white border-b text-sm sm:text-base">
                        <td class="p-4 sm:px-6 text-gray-900 whitespace-nowrap font-thin">
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
