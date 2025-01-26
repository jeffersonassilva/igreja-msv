<x-app-layout>
    <x-slot name="header">
        Cartas
    </x-slot>

    <section>
        <div class="flex gap-8 items-start select-none">
            <div class="flex-1">
                <form class="form-horizontal"
                      role="form"
                      method="post"
                      action="{{ route('cartas.store') }}">
                    @csrf

                    <x-form.input label="Título"
                                  name="titulo"
                                  maxlength="40"
                                  :value="old('titulo', 'Carta de Recomendação')"
                                  :required="true"
                                  :observacoes='["Máximo de 40 caracteres."]'/>

                    <x-form.input label="Nome"
                                  name="nome"
                                  maxlength="255"
                                  :value="old('nome', 'Anadalva Pereira de Oliveira Lisboa')"
                                  :required="true"
                                  :observacoes='["Máximo de 255 caracteres."]'/>

                    <x-form.input label="Forma de Tratamento"
                                  name="cargo"
                                  maxlength="30"
                                  :value="old('cargo', 'a diaconisa')"
                                  :observacoes='["Máximo de 30 caracteres."]'/>

                    <div class="grid xl:grid-cols-2 gap-0 p-0 m-0">
                        <x-form.input label="Cargo 1&ordf; Assinatura"
                                      name="cargo_assinatura1"
                                      maxlength="30"
                                      :value="old('cargo_assinatura1', 'Pastor Presidente')"
                                      :observacoes='["Máximo de 30 caracteres."]'/>

                        <x-form.input label="Nome 1&ordf; Assinatura"
                                      name="nome_assinatura1"
                                      maxlength="30"
                                      :value="old('nome_assinatura1', 'Samuel Novais')"
                                      :observacoes='["Máximo de 30 caracteres."]'/>
                    </div>

                    <div class="grid xl:grid-cols-2 gap-0 p-0 m-0">
                        <x-form.input label="Cargo 2&ordf; Assinatura"
                                      name="cargo_assinatura2"
                                      maxlength="30"
                                      :value="old('cargo_assinatura2', 'Secretária')"
                                      :observacoes='["Máximo de 30 caracteres."]'/>

                        <x-form.input label="Nome 2&ordf; Assinatura"
                                      name="nome_assinatura2"
                                      maxlength="30"
                                      :value="old('nome_assinatura2', 'Raniely Nunes')"
                                      :observacoes='["Máximo de 30 caracteres."]'/>
                    </div>


                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row">
                        <div class="mb-6 flex items-center gap-2">
                            <button aria-label="Salvar" type="submit"
                                    class="outline-0 rounded-md text-white font-normal
                                            border border-blue-400 bg-blue-400
                                            hover:bg-blue-500 focus:bg-blue-500
                                            px-3 py-1 inline-flex justify-center items-center
                                            dark:text-gray-900 dark:bg-yellow-400
                                            dark:hover:bg-yellow-300 dark:border-yellow-400">
                                <ion-icon name="document-text-outline"></ion-icon>
                                <span class="ml-2">Gerar Carta</span>
                            </button>
                        </div>

                        <div class="text-gray-400 text-xs font-thin mb-2">
                            <span class="text-red-500 font-bold">*</span> Preenchimento obrigatório
                        </div>
                    </div>
                </form>
            </div>

            <div class="hidden md:flex items-center">
                <div class="w-[280px] md:w-[480px] p-4 md:p-8 bg-white">
                    <div class="flex">
                        <div class="pr-3">
                            <img class="w-[8px] md:w-[40px]" src="{{ asset('img/logo-vazada.png') }}" alt="logo">
                        </div>
                        <div class="flex flex-col">
                            <div class="text-[7px] md:text-[14px]">
                                Igreja Evangélica Ministério Semeando a Verdade
                            </div>
                            <div class="text-[6px] md:text-[10px] tracking-tight font-thin">
                                PA 03 Lote 02 - Jardins Mangueiral - DF
                            </div>
                            <div class="text-[6px] md:text-[10px] tracking-tight font-thin">
                                CNPJ: 23.244.224/0001-44
                            </div>
                            <div class="text-[6px] md:text-[10px] tracking-tight font-thin">
                                (61) 99689-9317&nbsp;&nbsp;&bullet;&nbsp;&nbsp;www.igrejamsv.org.br
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div id="text-titulo"
                             class="text-[18px] m-1 md:m-6
                                 font-bold tracking-tight text-center">
                            {{ old('titulo', 'Carta de Recomendação') }}
                        </div>
                        <div class="text-[7px] md:text-[11px] leading-5 w-11/12">
                            <p class="pb-4 indent-4 text-justify">Queridos irmãos,</p>
                            <p class="pb-4 indent-4 text-justify">É com satisfação que a Igreja Evangélica
                                Ministério Semeando a Verdade vem, através desta carta, recomendar que os irmãos
                                desta estimada igreja recebam
                                <span id="text-cargo">{{ old('cargo', 'a diaconisa') }}</span>
                                <strong id="text-nome">{{ old('nome', 'Anadalva Pereira de Oliveira Lisboa') }}</strong>,
                                que se encontra em plena comunhão com nossa congregação e tem demonstrado
                                um compromisso exemplar na obra do Senhor.
                            </p>
                            <p class="pb-4 indent-4 text-justify">Estamos confiantes de que sua presença
                                em vosso meio será uma bênção, contribuindo para o avanço do reino de Deus
                                com dedicação e zelo.
                            </p>
                            <p class="pb-4 indent-4 text-justify">Aproveitamos a oportunidade para
                                expressar nossas cordiais saudações e desejar que a graça e a paz do nosso
                                Senhor Jesus Cristo estejam com todos os irmãos desta amada igreja.
                            </p>
                        </div>
                        <div id="box-assinatura-1" class="text-center text-[5px] md:text-[10px] mt-6">
                            <div>_______________________________________</div>
                            <div id="text-nome-assinatura-1" class="font-bold italic">
                                {{ old('nome_assinatura1', 'Samuel Novais') }}
                            </div>
                            <div id="text-cargo-assinatura-1" class="text-[8px]">
                                {{ old('cargo_assinatura1', 'Pastor Presidente') }}
                            </div>
                        </div>
                        <div id="box-assinatura-2" class="text-center text-[5px] md:text-[10px] my-6">
                            <div>_______________________________________</div>
                            <div id="text-nome-assinatura-2" class="font-bold italic">
                                {{ old('nome_assinatura2', 'Raniely Nunes') }}
                            </div>
                            <div id="text-cargo-assinatura-2" class="text-[8px]">
                                {{ old('cargo_assinatura2', 'Secretária') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            let titulo = $('#titulo');
            titulo.keyup(function () {
                $('#text-titulo').text(titulo.val());
            });

            let nome = $('#nome');
            nome.keyup(function () {
                $('#text-nome').text(nome.val());
            });

            let cargo = $('#cargo');
            cargo.keyup(function () {
                $('#text-cargo').text(cargo.val());
            });

            let nome_assinatura1 = $('#nome_assinatura1');
            nome_assinatura1.keyup(function () {
                $('#text-nome-assinatura-1').text(nome_assinatura1.val());
                if (nome_assinatura1.val().length === 0) {
                    $('#box-assinatura-1').hide();
                } else {
                    $('#box-assinatura-1').show()
                }
            });

            let nome_assinatura2 = $('#nome_assinatura2');
            nome_assinatura2.keyup(function () {
                $('#text-nome-assinatura-2').text(nome_assinatura2.val());
                if (nome_assinatura2.val().length === 0) {
                    $('#box-assinatura-2').hide();
                } else {
                    $('#box-assinatura-2').show()
                }
            });

            let cargo_assinatura1 = $('#cargo_assinatura1');
            cargo_assinatura1.keyup(function () {
                $('#text-cargo-assinatura-1').text(cargo_assinatura1.val());
            });

            let cargo_assinatura2 = $('#cargo_assinatura2');
            cargo_assinatura2.keyup(function () {
                $('#text-cargo-assinatura-2').text(cargo_assinatura2.val());
            });
        });
    </script>
</x-app-layout>
