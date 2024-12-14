@php
    $texto = 'foi batizado em nome do Pai, Filho e do Espírito Santo, conforme mandamento do Senhor Jesus Cristo em Mateus 28:19 no dia 15/09/2024.';
@endphp

<x-app-layout>
    <x-slot name="header">
        Certificados
    </x-slot>

    <section>
        <div class="flex gap-8 items-start select-none">
            <section class="flex-1">
                <form class="form-horizontal"
                      role="form"
                      method="post"
                      action="{{ route('certificados.store') }}">
                    @csrf

                    <x-form.input label="Título"
                                  name="titulo"
                                  maxlength="30"
                                  :value="old('titulo', 'Certificado de Batismo')"
                                  :required="true"
                                  :observacoes='["Máximo de 30 caracteres."]'/>

                    <x-form.input label="Nome"
                                  name="nome"
                                  maxlength="40"
                                  :value="old('nome', 'Jefferson Alessandro Santos da Silva')"
                                  :required="true"
                                  :observacoes='["Máximo de 40 caracteres."]'/>

                    <x-form.textarea label="Mensagem"
                                     name="mensagem"
                                     value="{{ old('mensagem', $texto) }}"
                                     rows="5"
                                     :required="true"
                                     :observacoes='["Máximo de 200 caracteres."]'/>

                    <div class="grid xl:grid-cols-2 gap-0 p-0 m-0">
                        <x-form.input label="Cargo na Assinatura"
                                      name="cargo_assinatura"
                                      maxlength="30"
                                      :value="old('cargo_assinatura', 'Pastor Presidente')"
                                      :observacoes='["Máximo de 255 caracteres."]'/>

                        <x-form.input label="Nome na Assinatura"
                                      name="nome_assinatura"
                                      maxlength="30"
                                      :value="old('nome_assinatura', 'Samuel Novais')"
                                      :observacoes='["Máximo de 255 caracteres."]'/>
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
                                <span class="ml-2">Gerar Certificado</span>
                            </button>
                        </div>

                        <div class="text-gray-400 text-xs font-thin mb-2">
                            <span class="text-red-500 font-bold">*</span> Preenchimento obrigatório
                        </div>
                    </div>
                </form>
            </section>

            <div class="hidden md:flex items-center">
                <div class="w-[280px] md:w-[450px] flex justify-center certificado relative">
                    <img class="w-[280px] md:w-[450px] max-w-[550px]" src="{{ asset('img/diploma-fundo.png') }}"
                         alt="logo">
                    <div class="w-[280px] md:w-[450px] max-w-[550px] absolute p-4 md:p-6">
                        <div class="flex justify-center">
                            <img class="w-[8px] md:w-[15px]" src="{{ asset('img/logo-vazada.png') }}" alt="logo">
                        </div>
                        <div class="text-center mt-1 text-[7px] md:text-[11px]">
                            Igreja Evangélica Ministério Semeando a Verdade
                        </div>
                        <div class="text-center text-[6px] md:text-[8px] tracking-tight font-thin">
                            PA 03 Lote 02 - Jardins Mangueiral - DF &nbsp;&nbsp;&nbsp;&nbsp; CNPJ: 23.244.224/0001-44
                        </div>
                        <div class="flex flex-col items-center">
                            <div id="text-titulo" style="font-family: 'Times New Roman', sans-serif;"
                                 class="text-[13px] md:text-[20px] m-1 md:m-3
                                 font-bold italic uppercase tracking-tight text-center">
                                {{ old('titulo', 'Certificado de Batismo') }}
                            </div>
                            <div class="text-[7px] md:text-[10px]">Certificamos que</div>
                            <div id="text-nome" style="font-family: 'Times New Roman', serif;"
                                 class="m-1 md:m-3 text-[13px] md:text-[20px]
                                 font-bold italic tracking-tight text-center">
                                {{ old('nome', 'Jefferson Alessandro Santos da Silva') }}
                            </div>
                            <div id="text-mensagem" class="text-[7px] md:text-[10px] text-center w-10/12">
                                {{ old('mensagem', $texto) }}
                            </div>
                            <div id="box-assinatura" class="text-center text-[5px] md:text-[10px] mt-3">
                                <div>_______________________________________</div>
                                <div id="text-nome-assinatura" class="font-bold italic leading-tight">
                                    {{ old('nome_assinatura', 'Samuel Novais') }}
                                </div>
                                <div id="text-cargo-assinatura" class="text-[8px] leading-tight">
                                    {{ old('cargo_assinatura', 'Pastor Presidente') }}
                                </div>
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

            let mensagem = $('#mensagem');
            mensagem.keyup(function () {
                $('#text-mensagem').text(mensagem.val());
            });

            let nome_assinatura = $('#nome_assinatura');
            nome_assinatura.keyup(function () {
                $('#text-nome-assinatura').text(nome_assinatura.val());
                if (nome_assinatura.val().length === 0) {
                    $('#box-assinatura').hide();
                } else {
                    $('#box-assinatura').show()
                }
            });

            let cargo_assinatura = $('#cargo_assinatura');
            cargo_assinatura.keyup(function () {
                $('#text-cargo-assinatura').text(cargo_assinatura.val());
            });
        });
    </script>
</x-app-layout>
