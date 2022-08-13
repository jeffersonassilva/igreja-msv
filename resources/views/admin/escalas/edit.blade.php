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
            <div class="mb-4 p-4 bg-white flex items-center">
                <form class="form-horizontal" role="form" method="post" action="{{ route('voluntarios.update', $voluntario) }}">
                @method('PUT')
                @csrf
                    <div class="flex flex-col md:flex-row-reverse md:justify-end md:items-center">
                        <label for="funcao_{{ $voluntario->id }}" class="text-sm font-thin text-gray-700 mb-2 md:mb-0 md:ml-4">{{ $voluntario->nome }}</label>
                        <select name="funcao" id="funcao_{{ $voluntario->id }}"
                                class="funcao_select border border-gray-400 text-gray-700 @error('funcao') border-[1px] border-red-500 @enderror">
                            <option value=""></option>
                            <option value="CG" @if('CG' === $voluntario->funcao) selected @endif>CG - Coordenador Geral</option>
                            <option value="R" @if('R' === $voluntario->funcao) selected @endif>R - Recepção</option>
                            <option value="A" @if('A' === $voluntario->funcao) selected @endif>A - Apoio</option>
                            <option value="H" @if('H' === $voluntario->funcao) selected @endif>H - Higienização</option>
                            <option value="SI" @if('SI' === $voluntario->funcao) selected @endif>SI - Segurança Interna</option>
                            <option value="SE" @if('SE' === $voluntario->funcao) selected @endif>SE - Segurança Externa</option>
                        </select>
                    </div>
                </form>
                <div class="flex-1 text-right">
                    <form action="{{ route('voluntarios.destroy', $voluntario) }}" method="POST" class="inline">
                        @method('DELETE')
                        @csrf
                        <button aria-label="Excluir"
                                class="outline-0 rounded-md text-blue-400 border border-blue-400
                                hover:text-white hover:bg-blue-400
                                focus:text-white focus:bg-blue-400
                                px-2 py-1 mr-1 inline-flex justify-center items-center">
                            <ion-icon name="archive-outline"></ion-icon><span class="ml-1">Excluir</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            $('.funcao_select').change(function (){
                let form = $(this).parent().parent();
                form.submit();
            });
        });
    </script>

</x-app-layout>

