<x-app-layout>
    <x-slot name="header">
        Visitantes
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <button type="button" id="btn-filtros" class="py-1 px-4 text-sm text-white bg-blue-400
                    dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:border-[#263141]
                    rounded-l-lg border-r border-white @cannot('adm-adicionar-voluntario') rounded-r-lg @endcan">
                Filtros
            </button>
            <button type="button" target="_blank" onclick="window.open('{{ route('visitantes.create') }}', '_blank')"
                class="py-1 px-4 text-sm text-white bg-blue-400 rounded-r-md
                dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300">
                Adicionar Visitante
            </button>
        </div>

        <form class="form-horizontal" action="{{ route('visitantes') }}">
            <div id="filtros" class="p-4 mb-4 md:p-6 bg-white rounded-lg hidden dark:bg-[#252c47]">
                <div class="mb-2 md:grid md:gap-x-6 xl:grid-cols-3 md:grid-cols-2 lg:mb-0">
                    <div class="w-full mb-6 md:mb-4 sm:col-span-2">
                        <h3 class="mb-1 font-medium text-gray-700 dark:text-[#d0d9e6]">Nome</h3>
                        <input type="text" id="nome" name="nome" class="border-gray-300 w-full rounded-lg text-gray-600
                               dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]"
                            value="{{ request()->query('nome') }}">
                    </div>
                    <div class="w-full mb-6 sm:mb-4 md:col-span-2">
                        <h3 class="mb-1 font-medium text-gray-700 dark:text-[#d0d9e6]">Período da visita</h3>
                        <div class="flex items-center gap-2 flex-col sm:flex-row">
                            <div class="flex gap-2 items-center w-full">
                                <span class="text-sm text-gray-500">de</span>
                                <input type="date" name="dt_visita_inicio" id="dt_visita_inicio" class="border-gray-300 w-full rounded-lg text-gray-600
                                       dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]"
                                    value="{{ request()->query('dt_visita_inicio') }}">
                            </div>
                            <div class="flex gap-2 items-center w-full">
                                <span class="text-sm text-gray-500">até</span>
                                <input type="date" name="dt_visita_fim" id="dt_visita_fim" class="border-gray-300 w-full rounded-lg text-gray-600
                                dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]"
                                    value="{{ request()->query('dt_visita_fim') }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full mb-6 md:mb-4 xl:row-start-1 xl:col-start-3 row-span-3">
                        <h3 class="mb-1 font-medium text-gray-700 dark:text-[#d0d9e6]">Visitantes que</h3>
                        <ul
                            class="mb-3 md:mb-0 items-center text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-300 dark:bg-[#1c2039] dark:border-[#343d61]">
                            <li class="w-full border-b border-gray-300">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('responsavel') == '1') checked @endif
                                    id="situacao-responsavel" type="checkbox" value="1" name="responsavel"
                                    class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300
                                    focus:ring-1">
                                    <label for="situacao-responsavel"
                                        class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Estão sendo acompanhados
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('oracao') == '1') checked @endif
                                    id="situacao-oracao" type="checkbox" value="1" name="oracao"
                                    class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300
                                    focus:ring-1">
                                    <label for="situacao-oracao"
                                        class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Estão na lista de oração
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 dark:border-[#343d61]">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('congregando') == '1') checked @endif
                                    id="situacao-congregando" type="checkbox" value="1" name="congregando"
                                    class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300
                                    focus:ring-1">
                                    <label for="situacao-congregando"
                                        class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Estão congregando
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-gray-300 dark:border-[#343d61]">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('deseja_batismo') == '1') checked @endif
                                    id="situacao-deseja-batismo" type="checkbox" value="1" name="deseja_batismo"
                                    class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300
                                    focus:ring-1">
                                    <label for="situacao-deseja-batismo"
                                        class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Desejam batismo
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full mb-4 sm:mb-0 md:mb-6">
                        <h3 class="mb-1 font-medium text-gray-700 dark:text-[#d0d9e6]">Sexo</h3>
                        <ul class="mb-3 md:mb-0 items-center lg:w-min text-sm font-medium text-gray-900
                                bg-white rounded-lg border border-gray-300 lg:flex
                                dark:bg-[#1c2039] dark:border-[#343d61]">
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r dark:border-[#343d61]">
                                <div class="flex items-center pl-3">
                                    <input id="sexo-option-0" type="radio" checked value="" name="sexo" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300
                                           focus:ring-gray-300 focus:ring-1 dark:bg-[#252c47]
                                           dark:border-[#343d61] dark:focus:ring-0 dark:checked:bg-yellow-400">
                                    <label for="sexo-option-0" class="py-2 ml-2 mr-3 w-full font-thin text-sm
                                            text-gray-600 dark:text-[#d0d9e6]">
                                        Todos
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r dark:border-[#343d61]">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('sexo') == 'M') checked @endif
                                    id="sexo-option-1" type="radio" value="M" name="sexo"
                                    class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300
                                    focus:ring-gray-300 focus:ring-1 dark:bg-[#252c47]
                                    dark:border-[#343d61] dark:focus:ring-0 dark:checked:bg-yellow-400">
                                    <label for="sexo-option-1" class="py-2 ml-2 mr-3 w-full font-thin text-sm
                                           text-gray-600 dark:text-[#d0d9e6]">
                                        Masculino
                                    </label>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('sexo') == 'F') checked @endif
                                    id="sexo-option-2" type="radio" value="F" name="sexo"
                                    class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300
                                    focus:ring-gray-300 focus:ring-1 dark:bg-[#252c47]
                                    dark:border-[#343d61] dark:focus:ring-0 dark:checked:bg-yellow-400">
                                    <label for="sexo-option-2" class="py-2 ml-2 mr-3 w-full font-thin text-sm
                                           text-gray-600 dark:text-[#d0d9e6]">
                                        Feminino
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                                    hover:bg-blue-500 focus:bg-blue-500
                                    dark:text-[#d0d9e6] dark:bg-[#51596b] dark:hover:bg-[#656b7b] dark:border-[#51596b]
                                    px-3 py-1 inline-flex justify-center items-center">
                        <ion-icon name="filter"></ion-icon>
                        <span class="ml-2">Filtrar</span>
                    </button>
                </div>
            </div>
        </form>
    </section>

    <section>
        @if(count($visitantes))
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4 mb-4">
            @foreach($visitantes as $visitante)
            <div class="bg-white p-3 shadow-sm rounded-md border-[1px] border-gray-200
                        dark:bg-[#252c47] dark:border-[#252c47]">
                <div class="grid grid-cols-[68px,1fr] items-center gap-2">
                    <div class="flex flex-col justify-center items-center">
                        <div>
                            @if($visitante->sexo == 'M')
                            <img src="{{ asset('img/icon_profile_man.jpg') }}" alt="avatar"
                                class="w-[60px] rounded-full object-cover aspect-square border-2 border-gray-100
                                        p-[2px] dark:border-[#454b54]">
                            @else
                            <img src="{{ asset('img/icon_profile_woman.jpg') }}" alt="avatar"
                                class="w-[60px] rounded-full object-cover aspect-square border-2 border-gray-100
                                        p-[2px] dark:border-[#454b54]">
                            @endif
                        </div>
                        <div class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6] line-clamp-1">
                            {{ App\Helpers\Strings::calcularIdade($visitante->dt_nascimento, true) }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="text-gray-700 font-medium dark:text-white line-clamp-1">
                            {{ $visitante->nome }}
                        </div>
                        <div>
                            <div class="mb-2 sm:mb-1 grid sm:grid-cols-[90px,1fr] items-center text-sm">
                                <div class="font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    Visitou em:
                                </div>
                                <div class="text-gray-500 font-medium">
                                    {{ \Carbon\Carbon::parse($visitante->dt_visita)->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="mb-2 sm:mb-1 grid sm:grid-cols-[90px,1fr] items-center text-sm">
                                <div class="font-thin text-gray-500 dark:text-[#d0d9e6]">
                                    @if ($visitante->whatsapp) WhastApp: @else Telefone: @endif
                                </div>
                                <div class="text-gray-500 font-medium">
                                    @if($visitante->telefone && $visitante->whatsapp)
                                        <a class="underline underline-offset-4" href="https://wa.me/55{{ preg_replace('/\D/', '', $visitante->telefone) }}"
                                            target="_blank">{{ $visitante->telefone }}
                                        </a>
                                    @else
                                        Não informado
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2 sm:mb-1 grid sm:grid-cols-[90px,1fr] items-center text-sm">
                                <div class="font-thin text-gray-500 dark:text-[#d0d9e6] ">
                                    Responsável:
                                </div>
                                <div class="text-blue-600 font-medium">
                                    {{ $visitante->responsavel }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @can('adm-editar-visitante')
                <div class="text-sm mt-2 pt-2 border-t border-t-gray-100 dark:border-t-[#34384e]">
                    <x-button.link title="Acompanhar" :route="route('visitantes.edit', $visitante)" />
                </div>
                @endcan
            </div>
            @endforeach
        </div>
        <div class="mb-4">
            {{ $visitantes->appends($filters)->links() }}
        </div>
        @endif
    </section>

    <x-dialog.confirm></x-dialog.confirm>

    <script>
        $(document).ready(function () {
            $('#btn-filtros').on('click', function () {
                $('#filtros').toggle();
                if ($(this).hasClass('bg-blue-500')) {
                    $(this).removeClass('bg-blue-500');
                } else {
                    $(this).addClass('bg-blue-500');
                }
            });
        });
    </script>

</x-app-layout>
