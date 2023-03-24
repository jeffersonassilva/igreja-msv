<x-app-layout>
    <x-slot name="header">
        Relatório de Voluntários
    </x-slot>

    <section>
        <div id="filtros" class="p-4 mb-4 bg-white rounded-lg">
            <div class="flex justify-between gap-2">
                <div class="flex-1">
                    <form class="form-horizontal" role="form" action="{{ route('relatorio.mensal.voluntarios') }}">
                        <select id="periodo_relatorio" name="periodo"
                                class="sm:max-w-[250px] bg-white border border-gray-300 text-gray-500 rounded-lg
                                focus:ring-blue-500 focus:border-blue-500 w-full">
                            <option value="">Geral</option>
                            <optgroup label="Por Ano">
                                @foreach($anos as $key => $ano)
                                <option value="{{ $key }}" @if(request()->query('periodo') == $key) selected @endif>
                                    {{ $ano }}
                                </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Por Mês">
                                @foreach($meses as $key => $mes)
                                <option value="{{ $key }}" @if(request()->query('periodo') == $key) selected @endif>
                                    {{ $mes }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </form>
                </div>
                <div class="flex items-center">
                    <button id="btn-gerar-relatorio-pdf"
                            class="outline-0 rounded-md text-2xl sm:text-base text-blue-400 font-normal
                                    border border-blue-400
                                    hover:text-white hover:bg-blue-400
                                    focus:text-white focus:bg-blue-400
                                    px-3 py-2 inline-flex justify-center items-center">
                        <ion-icon name="cloud-download-outline"></ion-icon><span class="hidden sm:block ml-2">Baixar Arquivo</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="p-0 sm:p-4 sm:bg-white sm:rounded-lg">
        <section class="lg:w-1/2">
            <header class="text-sm text-gray-500 bg-white p-4 text-center border border-gray-200 rounded-t-xl">
                Quantidade de vezes em que o voluntário foi escalado.
            </header>
            <div class="bg-gray-200 px-3 py-4 sm:px-6 flex justify-between text-sm sm:text-base uppercase font-medium">
                <div class="flex items-center cursor-pointer btn-order" data-order-name="nome">
                    <div class="mr-2 md:mr-4">#</div>
                    Nome
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                </div>
                <div class="flex items-center cursor-pointer btn-order" data-order-name="presenca">
                    Quantidade
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                </div>
            </div>
            @foreach($voluntarios as $key => $voluntario)
            <div class="bg-gray-50 odd:bg-white py-4 px-2 sm:p-4 sm:px-6 border-b border-x border-gray-200 flex gap-1 justify-between @if($loop->last) rounded-b-xl @endif">
                <div class="text-center text-gray-400 mr-2 md:mr-4 w-4">
                    {{ $key + 1 }}
                </div>
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

                <div class="flex gap-1 font-thin">
                    @if($voluntario->falta)
                    <div class="text-center">
                        <div class="border border-gray-200 block flex justify-center items-center w-6 h-6 rounded-full text-xs">
                            {{ $voluntario->falta }}
                        </div>
                        <div class="text-xs text-gray-400">F</div>
                    </div>
                    @endif
                    @if($voluntario->falta_justificada)
                    <div class="text-center">
                        <div class="border border-gray-200 block flex justify-center items-center w-6 h-6 rounded-full text-xs">
                            {{ $voluntario->falta_justificada }}
                        </div>
                        <div class="text-xs text-gray-400">FJ</div>
                    </div>
                    @endif
                    <div class="text-center">
                        <div class="border border-gray-200 block flex justify-center items-center w-10 h-10 rounded-full text-xl font-normal">
                            {{ $voluntario->presenca }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#periodo_relatorio').on('change', function () {
                $('.form-horizontal').submit();
            });

            $('#btn-gerar-relatorio-pdf').on('click', function () {
                const queryString = window.location.search;
                window.open('{{ route('relatorio.voluntarios.download') }}' + queryString, '_blank');
            });
        });
    </script>
</x-app-layout>
