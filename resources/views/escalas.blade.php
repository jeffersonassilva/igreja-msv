@extends('layouts.default')

@section('content')

    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1080px] p-4">
            <h1 class="titulo-separador" style="margin-bottom: 10px;">Escalas</h1>

            <div class="mb-6 flex justify-center items-center rounded-md" role="group">
                <button type="button" id="btn-filtros" class="py-1 px-4 text-sm text-gray-700 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-200 @if(request()->query()) bg-gray-200 @endif">
                    Filtros
                </button>
                <button type="button" id="btn-instrucoes" class="py-1 px-4 text-sm text-gray-700 bg-white rounded-r-md border-y border-r border-gray-300 hover:bg-gray-200">
                    Instruções
                </button>
            </div>

            <div id="filtros" class="p-4 md:p-6 mb-12 bg-white rounded-lg @if(!request()->query()) hidden @endif">
                <div class="mb-6 md:flex lg:block gap-6">
                    <div class="w-full md:w-2/5 mb-4">
                        <h3 class="mt-4 mb-1 font-thin text-sm text-gray-400">Por Período</h3>
                        <ul class="mb-3 md:mb-0 items-center lg:w-min text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-300 lg:flex">
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input id="meses" type="radio" checked value="" name="lista-meses" class="input-periodo w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="meses" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Todos
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('periodo') == 'manha') checked @endif
                                    id="periodo-1" type="radio" value="manha" name="lista-meses" class="input-periodo w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="periodo-1" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Manhã
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-300 lg:border-b-0 lg:border-r">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('periodo') == 'tarde') checked @endif
                                    id="periodo-2" type="radio" value="tarde" name="lista-meses" class="input-periodo w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="periodo-2" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Tarde
                                    </label>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex items-center pl-3">
                                    <input @if(request()->query('periodo') == 'noite') checked @endif
                                    id="periodo-3" type="radio" value="noite" name="lista-meses" class="input-periodo w-3 h-3 text-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-300 focus:ring-1">
                                    <label for="periodo-3" class="py-2 ml-2 mr-3 w-full font-thin text-sm text-gray-600">
                                        Noite
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="w-full md:max-w-[250px] mb-4">
                        <h3 class="mt-4 mb-1 font-thin text-sm text-gray-400">Por Evento</h3>
                        <select id="lista-eventos" class="mb-1 bg-white border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                            <option value="" selected>Todos</option>
                            @foreach($eventos as $evento)
                            <option value="{{ $evento->id }}" @if(request()->query('evento_id') && request()->query('evento_id') == $evento->id) selected @endif>
                                {{ $evento['descricao'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div id="instrucoes" class="hidden p-4 md:p-6 mb-12 bg-amber-50 text-gray-800 rounded-lg">
                <p class="font-thin mb-4">
                    Para se voluntariar, basta adicionar o seu nome no local indicado referente ao evento em questão,
                    e clicar no botão <ion-icon name="add-circle-outline" class="text-gray-500"></ion-icon>.
                </p>
                <p class="font-thin mb-4">
                    Caso o seu nome já esteja na lista de voluntários, seu nome irá aparecer quando você começar a
                    digitar, facilitando sua inclusão na escala e garantindo que não haja um segundo cadastro
                    desnecessário na lista de voluntários.
                </p>
                <p class="font-thin mb-4">
                    Após sua inclusão como voluntário na escala, o responsável pelas escalas da igreja atribuirá sua
                    função de acordo com a necessidade, mas você pode solicitar a troca posteriormente. Segue a lista de funções abaixo.
                </p>
                <ul class="font-thin text-sm mb-4 md:text-base grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
                    <li>
                        <span class="bg-gray-200 font-normal rounded-sm w-[25px] h-[20px] mr-1 inline-flex
                        items-center justify-center cursor-help select-none" title="Coordenador Geral">CG
                        </span>- Coordenador Geral</li>
                    <li>
                        <span class="bg-gray-200 font-normal rounded-sm w-[25px] h-[20px] mr-1 inline-flex
                        items-center justify-center cursor-help select-none" title="Recepção">R
                        </span>- Recepção
                    </li>
                    <li>
                        <span class="bg-gray-200 font-normal rounded-sm w-[25px] h-[20px] mr-1 inline-flex
                        items-center justify-center cursor-help select-none" title="Apoio">A
                        </span>- Apoio
                    </li>
                    <li>
                        <span class="bg-gray-200 font-normal rounded-sm w-[25px] h-[20px] mr-1 inline-flex
                        items-center justify-center cursor-help select-none" title="Higienização">H
                        </span>- Higienização
                    </li>
                    <li class="lg:row-start-1 lg:col-start-3">
                        <span class="bg-gray-200 font-normal rounded-sm w-[25px] h-[20px] mr-1 inline-flex
                        items-center justify-center cursor-help select-none" title="Segurança Interna">SI
                        </span>- Segurança Interna
                    </li>
                    <li>
                        <span class="bg-gray-200 font-normal rounded-sm w-[25px] h-[20px] mr-1 inline-flex
                        items-center justify-center cursor-help select-none" title="Segurança Externa">SE
                        </span>- Segurança Externa
                    </li>
                    <li>
                        <span class="border border-dashed border-gray-300 font-normal rounded-sm w-[25px] h-[20px] mr-1
                             inline-flex items-center justify-center cursor-help select-none"
                              title="Função não definida">&nbsp;
                        </span>- Função não definida
                    </li>
                </ul>
                <p class="font-normal text-red-700 mb-4">
                    <span class="font-medium">IMPORTANTE</span>: Caso ocorra algum imprevisto e você não possa comparecer,
                    é necessário avisar o quanto antes para que possamos te substituir por outro voluntário.
                </p>
            </div>

{{--                <ul class="inline-flex gap-4 mb-8 text-sm font-thin">--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#ff8537] bg-[#ff8537]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Limpeza</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#00d5ff] bg-[#00d5ff]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Culto Público</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#e969ff] bg-[#e969ff]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Culto de Mulheres</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#355bf0] bg-[#355bf0]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Culto de Imersão</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#42cb82] bg-[#42cb82]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">EBD</span>--}}
{{--                    </li>--}}
{{--                    <li class="flex items-center">--}}
{{--                        <ion-icon name="radio-button-on" class="text-[#ed143d] bg-[#ed143d]"></ion-icon>--}}
{{--                        <span class="pl-1 text-gray-500">Seminário de Casais</span>--}}
{{--                    </li>--}}
{{--                </ul>--}}

            @if($escalas->count())
            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 md:grid-cols-3 xl:gap-8 xl:grid-cols-3 mb-8">
                @foreach($escalas as $escala)
                    <x-escala-card-item :escala="$escala" :funcoes="$funcoes">
                        @if(!$escala->fechada)
                        <form role="form" action="{{ route('escalaVoluntario.new') }}" method="post">
                            <div class="px-4 pb-4 flex justify-center items-center gap-1">
                                <input type="hidden" name="escala_id" value="{{ $escala->id }}">
                                <input name="nome" list="nome" autocomplete="off" type="text" placeholder="Digite seu nome" class="border border-gray-200 rounded-md w-full text-sm font-thin" />

                                <datalist id="nome">
                                    @foreach($voluntarios as $voluntarioItem)
                                        <option value="{{ $voluntarioItem->nome }}">
                                    @endforeach
                                </datalist>

                                <div class="pl-2 text-2xl">
                                    <button aria-label="Salvar" type="submit" class="flex items-center">
                                        <ion-icon name="add-circle-outline" class="text-gray-400"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </x-escala-card-item>
                @endforeach
            </div>
            @endif
        </div>

        @if(!$escalas->count())
            <div class="container mx-auto max-w-[1080px] pt-4 flex flex-col justify-center items-center">
                <div>
                    <img
                        class="w-[200px] md:w-[300px]"
                        src="{{ asset('/img/results-not-found.png') }}"
                        alt="sem registros">
                </div>
                <div class="md:text-xl text-neutral-500 py-4 mb-10 md:mb-20">
                    Nenhum registro encontrado!
                </div>
            </div>
        @endif

    </section>
@endsection

@section('add-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn-filtros').on('click', function () {
                $('#instrucoes').hide();
                $('#btn-instrucoes').removeClass('bg-gray-200');

                $('#filtros').toggle();
                if ($(this).hasClass('bg-gray-200')) {
                    $(this).removeClass('bg-gray-200');
                } else {
                    $(this).addClass('bg-gray-200');
                }
            });

            $('#btn-instrucoes').on('click', function () {
                $('#filtros').hide();
                $('#btn-filtros').removeClass('bg-gray-200');

                $('#instrucoes').toggle();
                if ($(this).hasClass('bg-gray-200')) {
                    $(this).removeClass('bg-gray-200');
                } else {
                    $(this).addClass('bg-gray-200');
                }
            });

            $('#lista-eventos').on('change', function () {
                let id = $(this).val();
                insertParam('evento_id', id);
            });

            $('.input-periodo').on('change', function () {
                let text = $(this).val();
                insertParam('periodo', text);
            });

        });

        function insertParam(key, value) {
            key = encodeURIComponent(key);
            value = encodeURIComponent(value);

            // kvp looks like ['key1=value1', 'key2=value2', ...]
            var kvp = document.location.search.substr(1).split('&');
            let i=0;

            for(; i<kvp.length; i++){
                if (kvp[i].startsWith(key + '=')) {
                    let pair = kvp[i].split('=');
                    pair[1] = value;
                    kvp[i] = pair.join('=');
                    break;
                }
            }

            if(i >= kvp.length){
                kvp[kvp.length] = [key,value].join('=');
            }

            // can return this or...
            let params = kvp.join('&');

            // reload page with new params
            document.location.search = params;
        }
    </script>
@endsection
