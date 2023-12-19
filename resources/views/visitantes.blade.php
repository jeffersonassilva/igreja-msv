@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Visitantes</h2>
@endsection

@section('content')
    <section class="container mx-auto max-w-[1080px] px-4 pb-4">
        <div
            class="p-6 sm:p-8 my-4 sm:my-8 text-center text-gray-600 bg-white border border-gray-100 rounded-lg font-thin italic sm:text-lg">
            <div>
                Gratidão por escolher estar conosco hoje! Sua presença enriquece nossa comunidade e fortalece a jornada
                que trilhamos juntos na fé. Seja bem-vindo à nossa família na Igreja Evangélica Ministério Semeando a
                Verdade!
            </div>
            <div class="pt-4">
                Além disso, queremos assegurar a você que suas informações serão armazenadas
                de forma sigilosa e respeitosa.
                Pedimos esses dados não apenas para mantermos contato, mas também para estarmos
                à disposição em oração por você, fortalecendo os laços que compartilhamos como uma comunidade de fé.
                Sua confiança é valiosa para nós, e estamos aqui para apoiá-lo em cada passo da sua jornada espiritual.
            </div>
        </div>
        <form class="form-horizontal" role="form"
              action="{{ route('visitantes.store') }}"
              method="post">

            <x-form.avaliacao
                label="Qual é a probabilidade de você recomendar o Ministério Semeando a Verdade a outras pessoas, se solicitado?"
                name="recomendacao"
            />

            <x-form.input label="Data da Visita:"
                          name="dt_visita"
                          type="date"
                          min="{{ date('Y') . '-01-01' }}"
                          max="{{ date('Y-m-d') }}"
                          size="md:max-w-[250px]"
                          :required="true"/>

            <x-form.input label="Nome:"
                          name="nome"
                          maxlength="255"
                          :required="true"/>

            <x-form.select label="Sexo"
                           name="sexo"
                           size="md:max-w-[250px]"
                           :blank="true"
                           :options='[["id" => "M", "descricao" => "Masculino"], ["id" => "F", "descricao" => "Feminino" ]]'
                           :reference="old('sexo')"
            />

            <x-form.input label="Data de Nascimento"
                          name="dt_nascimento"
                          type="date"
                          size="md:max-w-[250px]"
            />

            <x-form.input label="Endereço"
                          name="endereco"
                          maxlength="255"
            />

            <x-form.input label="Telefone"
                          mask="telefone"
                          name="telefone"
                          maxlength="15"
                          size="md:max-w-[250px]"
            />

            <x-form.select label="WhatsApp?"
                           name="whatsapp"
                           size="md:max-w-[250px]"
                           :blank="true"
                           :options='[["id" => "1", "descricao" => "Sim"], ["id" => "0", "descricao" => "Não" ]]'
                           :reference="old('whatsapp')"
            />

            <x-form.select label="É batizado nas águas?"
                           name="batizado"
                           size="md:max-w-[250px]"
                           :blank="true"
                           :options='[["id" => "1", "descricao" => "Sim"], ["id" => "0", "descricao" => "Não" ]]'
                           :reference="old('batizado')"
            />

            <x-form.textarea label="Observações"
                             name="observacao"
                             :observacoes='[
                                "Utilize esse campo para compartilhar alguma informação importante, sugestões, etc.."
                             ]'/>

            <div class="flex flex-col mb-4 rounded-md">
                <div class="mt-6 mb-6 flex items-center gap-2">
                    <button aria-label="Salvar" type="button" id="btnEnviar" onclick="disableButton()"
                            class="outline-0 rounded-md text-white font-normal bg-blue-800
                            hover:bg-blue-900 focus:bg-blue-900
                            px-4 py-2 md:px-6 inline-flex justify-center items-center">
                        Enviar
                    </button>
                </div>
            </div>
        </form>
    </section>

    <script>
        function disableButton() {
            $('#btnEnviar').attr('disabled', true)
                .text('enviando ...')
                .css('background-color', '#5470b6');
            $('.form-horizontal').submit();
        }
    </script>
@endsection
