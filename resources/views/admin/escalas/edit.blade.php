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

            <x-form.input label="Data"
                          name="dt_escala"
                          type="date"
                          min="{{ date('Y-m') . '-01' }}"
                          max="{{ date('Y-m-d', strtotime('+2 month')) }}"
                          size="md:max-w-[250px]"
                          value="{{ old('dt_escala') ?? \Carbon\Carbon::parse($data->data)->format('Y-m-d') }}"
                          :required="true"
                          :observacoes='["Informe a data da escala."]' />

            <x-form.input label="Hora"
                          name="hr_escala"
                          type="time"
                          size="md:max-w-[250px]"
                          value="{{ old('hr_escala') ?? \Carbon\Carbon::parse($data->data)->format('H:i') }}"
                          :required="true"
                          :observacoes='["Informe o horário de início da escala."]' />

            <x-form.select label="Evento"
                           name="evento_id"
                           size="md:max-w-[250px]"
                           :required="true"
                           :options="$eventos"
                           :reference="$data->evento_id"
                           :observacoes='["Selecione o evento a qual a escala se refere."]' />

            <x-form.select label="Status"
                           name="fechada"
                           size="md:max-w-[250px]"
                           :reference="$data->fechada"
                           :options='[["id" => "1", "descricao" => "Fechada"], ["id" => "0", "descricao" => "Aberta" ]]'
                           :observacoes='[
                              "Por padrão, toda escala é cadastrada como <span class=\"text-blue-400\">Aberta</span>.",
                              "Se o status for <span class=\"text-blue-400\">Fechada</span>, os voluntários não terão mais acesso a esta escala."
                           ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('escalas')"
                            :infoRequired="true" />
        </form>
    </section>

    @if(count($data->voluntarios))
    <section class="py-6">
        <h3 class="text-gray-500 pb-4">
            Lista de Voluntários
        </h3>
        @foreach($data->voluntarios as $key => $voluntario)
            <div>
                <div class="flex flex-col mb-4 px-4 pt-4 bg-white dark:bg-[#252c47]">
                    <p class="text-gray-500 font-normal mb-2 dark:text-[#d0d9e6]">
                        <span class="inline-flex justify-center items-center w-6 h-6 bg-gray-400 rounded-full text-white">{{ ++$key }}</span>
                        {{ $voluntario->voluntario->nome }}
                    </p>
                    <div class="flex flex-col">
                        <label for="funcao-{{ $voluntario->id }}" class="text-sm font-thin text-gray-500 mb-1">Selecione a função do voluntário.</label>
                        <select name="funcao" id="funcao-{{ $voluntario->id }}"
                                class="border border-gray-400 w-full md:max-w-[250px]
                                 dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]
                                 @error('funcao') border-[1px] border-red-500 dark:border-[#642828] @enderror">
                            <option value=""></option>
                            @if($data->evento_id == \App\Models\Evento::EBD)
                            <optgroup label="Geral">
                            @endif
                                <option value="CG" @if('CG' === $voluntario->funcao) selected @endif>CG - Coordenador Geral</option>
                                <option value="R" @if('R' === $voluntario->funcao) selected @endif>R - Recepção</option>
                                <option value="A" @if('A' === $voluntario->funcao) selected @endif>A - Apoio</option>
                                <option value="H" @if('H' === $voluntario->funcao) selected @endif>H - Higienização</option>
                                <option value="SI" @if('SI' === $voluntario->funcao) selected @endif>SI - Segurança Interna</option>
                                <option value="SE" @if('SE' === $voluntario->funcao) selected @endif>SE - Segurança Externa</option>
                            @if($data->evento_id == \App\Models\Evento::EBD)
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
                            @endif
                        </select>
                    </div>

                    <div class="flex flex-col mt-4">
                        <label for="date" class="text-sm font-thin text-gray-500 mb-1">Indicador de presença do voluntário.</label>
                        <select name="comparecimento" id="comparecimento-{{ $voluntario->id }}" data-comparecimento-id="{{ $voluntario->id }}"
                                class="border border-gray-400 w-full md:max-w-[250px] selectComparecimento
                                dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]
                                @error('comparecimento') border-[1px] border-red-500 dark:border-[#642828] @enderror">
                            @foreach(\App\Helpers\Constants::COMPARECIMENTO_LISTA as $key => $comparecimento)
                            <option value="{{ $key }}" @if($key === $voluntario->comparecimento) selected @endif>{{ $comparecimento }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col mt-4 @if($voluntario->comparecimento !== 'FJ') hidden @endif">
                        <label for="date" class="text-sm font-thin text-gray-500 mb-1">Descreva a justificativa da ausência do voluntário.</label>
                        <textarea name="justificativa" id="justificativa-{{ $voluntario->id }}"
                                  class="border-gray-400 rounded-sm text-gray-700 w-full
                                  dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6] dark-autofill
                                  @error('justificativa') border-[1px] border-red-500 @enderror">{{ $voluntario->justificativa }}</textarea>
                    </div>

                    <div class="mt-3">
                        <button aria-label="Atualizar" type="button"
                                data-voluntario-id="{{ $voluntario->id }}"
                                class="btn-atualizar outline-0 rounded-md px-3 py-1 inline-flex justify-center items-center
                                text-white bg-primary hover:bg-primary-dark focus:bg-primary-dark
                                dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:border-yellow-400">
                            Atualizar
                        </button>

                        <x-button.delete :route="route('escalaVoluntario.destroy', $voluntario)"
                                         formId="form-excluir-voluntario-{{ $voluntario->id }}">
                        </x-button.delete>
                    </div>
                    <div id="message-api-{{ $voluntario->id }}" class="text-sm p-1 transition duration-1000 ease-in-out opacity-0">Atualizado com sucesso!</div>
                </div>
            </div>
        @endforeach
        <x-dialog.confirm></x-dialog.confirm>
    </section>
    @endif

    <section>
        <div class="mb-4 p-4 bg-white flex flex-col sm:flex-row sm:items-center dark:bg-[#252c47]">
            <form class="form-horizontal w-full" role="form" method="post" action="{{ route('escalaVoluntario.store') }}">
                @csrf
                <input type="hidden" name="dispositivo_os" value="Web">
                <input type="hidden" name="escala_id" value="{{ $data->id }}">
                <label for="nome" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">Novo voluntário</label><br />
                <span class="text-sm font-thin text-gray-500 dark:text-gray-400">- Esse campo abaixo pode ser utilizado para adicionar um novo voluntário a esta escala.</span><br />
                <span class="text-sm font-thin text-gray-500 dark:text-gray-400">- Voluntários com situação <span class="text-blue-400">Inativo</span> não aparecem nessa lista.</span><br />
{{--                <span class="text-sm font-thin text-gray-500">- Máximo de 100 caracteres caso o nome ainda não esteja na lista.</span>--}}
                <div class="flex flex-col md:flex-row md:justify-between md:items-center md:w-full mt-2">
                    <select name="voluntario_id" class="border-gray-400 rounded-sm text-gray-700 w-full md:max-w-[250px] @error('voluntario_id') border-[1px] border-red-500 @enderror dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]">
                        <option value=""></option>
                        @foreach($voluntarios as $voluntarioItem)
                            <option value="{{ $voluntarioItem['id'] }}">{{ $voluntarioItem['descricao'] }}</option>
                        @endforeach
                    </select>

                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                                        hover:bg-blue-500
                                        focus:bg-blue-500
                                        px-3 py-1 mt-3 md:mt-0 inline-flex justify-center items-center w-fit
                                        md:text-right
                                        dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:border-yellow-400">
                        <ion-icon name="add-circle-outline"></ion-icon><span class="ml-2">Adicionar</span>
                    </button>
                </div>
                @error('voluntario_id')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.selectComparecimento').on('change', function () {
                let comparecimento = $(this).val();
                let id = $(this).attr('data-comparecimento-id');
                let divJustificativa = $('#justificativa-' + id).parent();
                if (comparecimento === 'FJ') {
                    divJustificativa.removeClass('hidden');
                } else {
                    !divJustificativa.hasClass('hidden') ? divJustificativa.addClass('hidden') : null;
                }
            });

            $('.btn-atualizar').on('click', function () {
                const id = $(this).attr('data-voluntario-id');
                const funcao = $('#funcao-' + id).val();
                const comparecimento = $('#comparecimento-' + id).val();
                const justificativa = $('#justificativa-' + id).val();
                const botao = $(this);
                botao.attr('disabled', true);

                $.ajax({
                    type: "PUT",
                    url: '{{ route('api.escala.voluntario') }}',
                    dataType: "json",
                    data: {
                        'id': id ?? null,
                        'funcao': funcao ?? null,
                        'comparecimento': comparecimento ?? 'P',
                        'justificativa': comparecimento === 'FJ' ? justificativa ?? null : null,
                    },
                    success: function (response) {
                        if (response.retorno) {
                            $('#message-api-' + id)
                                .html('Atualizado com sucesso!')
                                .removeClass('text-red-400')
                                .addClass(['text-green-400', 'opacity-100']);
                        }
                    },
                    error: function () {
                        $('#message-api-' + id)
                            .html('Ocorreu um erro.')
                            .removeClass('text-green-400')
                            .addClass(['text-red-400', 'opacity-100']);
                    },
                    complete: function () {
                        botao.attr('disabled', false);
                        setTimeout(function () {
                            $('#message-api-' + id)
                                .removeClass(['text-green-400', 'text-red-400', 'opacity-100'])
                                .addClass('opacity-0');
                        }, 5000);
                    }
                });
            });
        });
    </script>

</x-app-layout>

