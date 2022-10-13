<x-app-layout>
    <x-slot name="header">
        Editar Escala
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('escalas.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="dt_escala" class="text-gray-900 mb-2">Data <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Informe a data da escala.</span>
                <input type="date" min="{{ date('Y-m-d') }}" max="{{ date("Y-m-d", strtotime("+1 month")) }}"
                       name="dt_escala" id="dt_escala"
                       class="md:max-w-[250px] border-gray-400 rounded-sm text-gray-700 @error('dt_escala') border-[1px] border-red-500 @enderror"
                       value="{{ old('dt_escala') ?? \Carbon\Carbon::parse($data->data)->format('Y-m-d') }}">
                @error('dt_escala')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="hr_escala" class="text-gray-900 mb-2">Hora <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Informe o horário de início da escala.</span>
                <input type="time" name="hr_escala" id="hr_escala"
                       class="md:max-w-[250px] border-gray-400 rounded-sm text-gray-700 @error('hr_escala') border-[1px] border-red-500 @enderror"
                       value="{{ old('hr_escala') ?? \Carbon\Carbon::parse($data->data)->format('H:i') }}">
                @error('hr_escala')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="evento_id" class="text-gray-900 mb-2">Evento <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Selecione o evento a qual a escala se refere.</span>
                <select name="evento_id" id="evento_id" class="border border-gray-400 text-gray-700 @error('evento_id') border-red-500 @enderror">
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}" @if($data->evento_id === $evento->id) selected @endif>{{ $evento->descricao }}</option>
                    @endforeach
                </select>
                @error('evento_id')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="fechada" class="text-gray-900 mb-2">Status</label>
                <span class="text-sm font-thin text-gray-500">- Por padrão, toda escala é cadastrada como <span class="text-blue-400">Aberta</span>.</span>
                <span class="text-sm font-thin text-gray-500 mb-2">- Se o status for <span class="text-blue-400">Fechada</span>, os voluntário não terão mais acesso a esta escala.</span>
                <select name="fechada" id="fechada" class="md:max-w-[150px] @error('fechada') border-[1px] border-red-500 @enderror">
                    <option value="1" @if($data->fechada === 1) selected @endif>Fechada</option>
                    <option value="0" @if($data->fechada === 0) selected @endif>Aberta</option>
                </select>
                @error('fechada')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between flex-col sm:flex-row">
                <div class="mb-6 flex items-center gap-2">
                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                                    hover:bg-blue-500
                                    focus:bg-blue-500
                                    px-3 py-1 inline-flex justify-center items-center">
                        <ion-icon name="save-outline"></ion-icon><span class="ml-2">Salvar</span>
                    </button>
                    <a href="{{ route('escalas') }}" aria-label="Voltar"
                       class="outline-0 rounded-md text-blue-400 font-normal border border-blue-400
                                    hover:text-white hover:bg-blue-400
                                    focus:text-white focus:bg-blue-400
                                    px-3 py-1 inline-flex justify-center items-center">
                        <ion-icon name="arrow-back-outline"></ion-icon><span class="ml-2">Voltar</span>
                    </a>
                </div>

                <div class="text-gray-400 text-xs font-thin mb-2">
                    <span class="text-red-500 font-bold">*</span> Preenchimento obrigatório
                </div>
            </div>
        </form>
    </section>

    @if(count($data->voluntarios))
    <section class="py-6">
        <h3 class="text-gray-500 pb-4">
            Lista de Voluntários
        </h3>
        @foreach($data->voluntarios as $voluntario)
            <div class="mb-4 p-4 bg-white flex flex-col md:flex-row md:items-center">
                <form class="form-horizontal flex-1" role="form" method="post" action="{{ route('escalaVoluntario.update', $voluntario) }}">
                @method('PUT')
                @csrf
                    <div class="flex flex-col md:flex-row-reverse md:justify-end md:items-center">
                        <label for="funcao_{{ $voluntario->id }}" class="text-sm font-thin text-gray-700 mb-2 md:mb-0 md:ml-4">{{ $voluntario->voluntario->nome }}</label>
                        <select name="funcao" id="funcao_{{ $voluntario->id }}"
                                class="funcao_select border border-gray-400 w-full sm:w-auto text-gray-700 @error('funcao') border-[1px] border-red-500 @enderror">
                                <option value=""></option>
                                <optgroup label="Geral">
                                <option value="CG" @if('CG' === $voluntario->funcao) selected @endif>CG - Coordenador Geral</option>
                                <option value="R" @if('R' === $voluntario->funcao) selected @endif>R - Recepção</option>
                                <option value="A" @if('A' === $voluntario->funcao) selected @endif>A - Apoio</option>
                                <option value="H" @if('H' === $voluntario->funcao) selected @endif>H - Higienização</option>
                                <option value="SI" @if('SI' === $voluntario->funcao) selected @endif>SI - Segurança Interna</option>
                                <option value="SE" @if('SE' === $voluntario->funcao) selected @endif>SE - Segurança Externa</option>
                            </optgroup>
                            <optgroup label="Professores">
                                <option value="DIR" @if('DIR' === $voluntario->funcao) selected @endif>DIR - Direção EBD</option>
                                <option value="PHM" @if('PHM' === $voluntario->funcao) selected @endif>PHM - Prof. Classe Homens</option>
                                <option value="PML" @if('PML' === $voluntario->funcao) selected @endif>PML - Prof. Classe Mulheres</option>
                                <option value="PJV" @if('PJV' === $voluntario->funcao) selected @endif>PJV - Prof. Classe Jovens</option>
                                <option value="PAD" @if('PAD' === $voluntario->funcao) selected @endif>PAD - Prof. Classe Adolescentes</option>
                                <option value="PIN" @if('PIN' === $voluntario->funcao) selected @endif>PIN - Prof. Classe Infantil</option>
                                <option value="PJR" @if('PJR' === $voluntario->funcao) selected @endif>PJR - Prof. Classe Júnior</option>
                                <option value="PNM" @if('PNM' === $voluntario->funcao) selected @endif>PNM - Prof. Classe Novos Membros</option>
                                <option value="PLO" @if('PLO' === $voluntario->funcao) selected @endif>PLO - Prof. Classe Líderes e Obreiros</option>
                                <option value="PCA" @if('PCA' === $voluntario->funcao) selected @endif>PCA - Prof. Classe Casais</option>
                            </optgroup>
                        </select>
                    </div>
                </form>
                <div class="mt-3 md:mt-0 md:text-right">
                    <form action="{{ route('escalaVoluntario.destroy', $voluntario) }}" method="POST" class="inline">
                        @method('DELETE')
                        <button aria-label="Excluir"
                                class="outline-0 rounded-md text-blue-400 border border-blue-400
                                hover:text-white hover:bg-blue-400
                                focus:text-white focus:bg-blue-400
                                px-2 py-1 mr-1 inline-flex justify-center items-center">
                            <ion-icon name="trash-outline"></ion-icon><span class="ml-1">Excluir</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
    @endif

    <section>
        <div class="mb-4 p-4 bg-white flex flex-col sm:flex-row sm:items-center">
            <form class="form-horizontal w-full" role="form" method="post" action="{{ route('escalaVoluntario.store') }}">
                @csrf
                <input type="hidden" name="escala_id" value="{{ $data->id }}">

                <label for="nome" class="text-gray-900">Novo voluntário</label><br />
                <span class="text-sm font-thin text-gray-500">Esse campo abaixo pode ser utilizado para adicionar um novo voluntário a esta escala.</span><br />
                <span class="text-sm font-thin text-gray-500">- Máximo de 100 caracteres caso o nome ainda não esteja na lista.</span>
                <div class="flex flex-col md:flex-row md:justify-between md:items-center md:w-full mt-2">
                    <input type="text" list="voluntarios" name="nome" id="nome" maxlength="100" autocomplete="off"
                           class="border-gray-400 rounded-sm text-gray-700 w-[225px] @error('nome') border-[1px] border-red-500 @enderror">

                    <datalist id="voluntarios">
                        @foreach($voluntarios as $voluntarioItem)
                            <option value="{{ $voluntarioItem->nome }}">
                        @endforeach
                    </datalist>

                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                                        hover:bg-blue-500
                                        focus:bg-blue-500
                                        px-3 py-1 mt-3 md:mt-0 inline-flex justify-center items-center w-fit
                                        md:text-right">
                        <ion-icon name="add-circle-outline"></ion-icon><span class="ml-2">Adicionar</span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.funcao_select').change(function (){
                let form = $(this).parent().parent();
                form.submit();
            });
        });
    </script>

</x-app-layout>

