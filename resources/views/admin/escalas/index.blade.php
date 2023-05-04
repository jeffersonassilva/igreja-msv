<x-app-layout>
    <x-slot name="header">
        Escalas
    </x-slot>

    <section>
        <div class="mb-4 p-4 flex justify-center items-center rounded-md bg-white" role="group">
            <button type="button" id="btn-filtros"
                    class="py-1 px-4 text-sm text-white bg-blue-400
                    rounded-l-lg border-r border-white @cannot('adm-adicionar-escala') rounded-r-lg @endcan">
                Filtros
            </button>
            @can('adm-adicionar-escala')
            <button type="button" onclick="window.location.href='{{ route('escalas.create') }}'"
                    class="py-1 px-4 text-sm text-white bg-blue-400 rounded-r-md">
                Adicionar Escala
            </button>
            @endcan
        </div>

        <form class="form-horizontal" role="form" action="{{ route('escalas') }}">
            <div id="filtros" class="p-4 mb-4 md:p-6 bg-white rounded-lg hidden">
                <div class="mb-2 sm:grid sm:gap-x-6 xl:grid-cols-3 lg:mb-0">
                    <div class="w-full lg:w-[300px] mb-6 sm:mb-4">
                        <h3 class="mb-1 font-medium text-sm text-gray-700">Evento</h3>
                        <select name="evento_id" class="lg:max-w-[250px] mb-1 bg-white border border-gray-300 text-gray-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full">
                            <option value="" selected>Todos</option>
                            @foreach($eventos as $evento)
                                <option value="{{ $evento->id }}" @if(request()->query('evento_id') && request()->query('evento_id') == $evento->id) selected @endif>
                                    {{ $evento['descricao'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full mb-6 sm:mb-4">
                        <h3 class="mb-1 font-medium text-sm text-gray-700">Data</h3>
                        <input type="date" name="dt_escala" id="dt_escala"
                               class="border-gray-300 w-full rounded-lg text-gray-500 lg:max-w-[250px]"
                               value="{{ request()->query('dt_escala') }}">
                    </div>
                    <div class="w-full mb-4 sm:mb-0 md:mb-6 sm:col-span-2 xl:col-span-1">
                        <h3 class="mb-1 font-medium text-sm text-gray-700">Escala fechada?</h3>
                        <ul class="mb-3 md:mb-0 items-center lg:w-min text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-300 lg:flex">
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input id="escala-fechada-option-0" type="radio" checked value="" name="fechada" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="escala-fechada-option-0" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Todos
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('fechada') == '1') checked @endif
                                    id="escala-fechada-option-1" type="radio" value="1" name="fechada" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="escala-fechada-option-1" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Sim
                                    </label>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('fechada') == '0') checked @endif
                                    id="escala-fechada-option-2" type="radio" value="0" name="fechada" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="escala-fechada-option-2" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Não
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                                    hover:bg-blue-500
                                    focus:bg-blue-500
                                    px-3 py-1 inline-flex justify-center items-center">
                        <ion-icon name="filter"></ion-icon><span class="ml-2">Filtrar</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 py-3 gap-4">
            @foreach($escalas as $escala)
                <x-card.escala :escala="$escala"></x-card.escala>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

    <script type="text/javascript">
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
