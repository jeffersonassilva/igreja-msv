<x-app-layout>
    <x-slot name="header">
        Voluntários
    </x-slot>

    <section>
        <div class="mb-4 p-4 flex justify-center items-center rounded-md bg-white" role="group">
            <button type="button" id="btn-filtros"
                    class="py-1 px-4 text-sm text-white bg-blue-400
                    rounded-l-lg border-r border-white @cannot('adm-adicionar-voluntario') rounded-r-lg @endcan">
                Filtros
            </button>
            @can('adm-adicionar-voluntario')
            <button type="button" onclick="window.location.href='{{ route('voluntarios.create') }}'"
                    class="py-1 px-4 text-sm text-white bg-blue-400 rounded-r-md">
                Adicionar Voluntário
            </button>
            @endcan
        </div>

        <form class="form-horizontal" role="form" action="{{ route('voluntarios') }}">
            <div id="filtros" class="p-4 mb-4 md:p-6 bg-white rounded-lg hidden">
                <div class="mb-2 md:grid md:gap-x-6 xl:grid-cols-3 lg:mb-0">
                    <div class="w-full lg:w-[300px] mb-6 md:mb-4 md:col-span-2 xl:col-span-1">
                        <h3 class="mb-1 font-medium text-sm text-gray-700">Nome</h3>
                        <input id="nome" type="text" value="{{ request()->query('nome') }}" name="nome"
                               class="border-gray-300 w-full rounded-lg text-gray-600">
                    </div>
                    <div class="w-full mb-6 md:mb-4">
                        <h3 class="mb-1 font-medium text-sm text-gray-700">Sexo</h3>
                        <ul class="mb-3 md:mb-0 items-center lg:w-min text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-300 lg:flex">
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input id="sexo-option-0" type="radio" checked value="" name="sexo" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="sexo-option-0" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Todos
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('sexo') == 'M') checked @endif
                                    id="sexo-option-1" type="radio" value="M" name="sexo" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="sexo-option-1" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Masculino
                                    </label>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('sexo') == 'F') checked @endif
                                    id="sexo-option-2" type="radio" value="F" name="sexo" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="sexo-option-2" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Feminino
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full mb-6 md:mb-4">
                        <h3 class="mb-1 font-medium text-sm text-gray-700">Professor EBD?</h3>
                        <ul class="mb-3 md:mb-0 items-center lg:w-min text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-300 lg:flex">
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input id="professor-ebd-option-0" type="radio" checked value="" name="professor_ebd" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="professor-ebd-option-0" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Todos
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('professor_ebd') == '1') checked @endif
                                    id="professor-ebd-option-1" type="radio" value="1" name="professor_ebd" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="professor-ebd-option-1" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Sim
                                    </label>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('professor_ebd') == '0') checked @endif
                                    id="professor-ebd-option-2" type="radio" value="0" name="professor_ebd" class="w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="professor-ebd-option-2" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
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

        <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
            @foreach($voluntarios as $voluntario)
                <div class="flex flex-col bg-white p-3 rounded-md">
                    <h3 class="text-gray-700 font-medium">{{ $voluntario->nome }}</h3>
                    <p class="text-sm mt-2 text-gray-500">
                        Sexo: <span class="font-thin">{{ $voluntario->sexo === 'M' ? 'Masculino' : 'Feminino' }}</span>
                    </p>
                    <p class="text-sm text-gray-500 flex-1">
                        Professor EBD: <span class="font-thin">{{ $voluntario->professor_ebd ? 'Sim' : 'Não' }}</span>
                    </p>
                    @if($voluntario->observacao)
                    <p class="text-sm text-gray-500">
                        Observação: <span class="font-thin">{{ $voluntario->observacao }}</span>
                    </p>
                    @endif

                    @canany(['adm-adicionar-voluntario', 'adm-excluir-voluntario'])
                        <div class="text-rights text-sm mt-3">
                            @can('adm-adicionar-voluntario')
                                <a aria-label="Editar" href="{{ route('voluntarios.edit', $voluntario) }}"
                                   class="outline-0 rounded-md text-blue-400 border border-blue-400
                                   hover:text-white hover:bg-blue-400 focus:text-white focus:bg-blue-400
                                   px-2 py-1 inline-flex justify-center items-center">
                                    <ion-icon name="create-outline"></ion-icon>
                                    <span class="ml-1">Editar</span>
                                </a>
                            @endcan

                            @can('adm-excluir-voluntario')
                                <x-button.delete :route="'voluntarios.destroy'" :object="$voluntario"></x-button.delete>
                            @endcan
                        </div>
                    @endcanany
                </div>
            @endforeach
        </div>
    </section>

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
