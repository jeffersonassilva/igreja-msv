@extends('layouts.default')

@section('content')
    <section class="container mx-auto max-w-[1280px]">
        <div class="flex flex-wrap flex-col justify-center items-center p-6">
            <h1 class="text-xl lg:text-3xl font-medium uppercase py-2 pb-5 lg:pb-8 lg:py-6 text-gray-600 lg:text-cyan-500">
                Ações Mensais
            </h1>
            <section id="timeline" class="w-full flex flex-wrap flex-col lg:flex-row justify-evenly bg-gray-100">
                <div class="flex-1 flex lg:flex-col items-center relative px-4 py-6">
                    <div class="absolute left-0 lg:left-auto lg:right-0 bottom-0 lg:bottom-auto lg:top-0 h-1/2 lg:h-auto lg:w-1/2 border-l-[3px] lg:border-b-[3px] border-cyan-400"></div>
                    <span class="flex-none text-2xl pr-4 lg:pr-0 lg:pb-3 w-[50px] lg:w-auto text-center leading-6">
                        <span class="text-sm text-gray-500">DIA</span><br>5
                    </span>
                    <div class="flex flex-col justify-center lg:items-center">
                        <p class="lg:text-center lg:h-16 font-thin pb-2">Entrega de cestas básicas</p>
                        <img class="w-full" src="{{ asset('img/timeline-1.jpg') }}" alt="Foto da entrega de cestas básicas">
                    </div>
                </div>
                <div class="flex-1 flex lg:flex-col items-center relative px-4 py-6 bg-white">
                    <div class="absolute left-0 lg:left-auto lg:top-0 h-full lg:h-auto lg:w-full border-l-[3px] lg:border-b-[3px] border-cyan-400"></div>
                    <span class="flex-none text-2xl pr-4 lg:pr-0 lg:pb-3 w-[50px] lg:w-auto text-center leading-6">
                        <span class="text-sm text-gray-500">DIA</span><br>10
                    </span>
                    <div class="flex flex-col justify-center lg:items-center">
                        <p class="lg:text-center lg:h-16 font-thin pb-2">Entrega de alimentos e sopas no SCS</p>
                        <img class="w-full" src="{{ asset('img/timeline-2.jpg') }}" alt="Foto da entrega de alimentos e sopas no SCS">
                    </div>
                </div>
                <div class="flex-1 flex lg:flex-col items-center relative px-4 py-6">
                    <div class="absolute left-0 lg:left-auto lg:top-0 h-full lg:h-auto lg:w-full border-l-[3px] lg:border-b-[3px] border-cyan-400"></div>
                    <span class="flex-none text-2xl pr-4 lg:pr-0 lg:pb-3 w-[50px] lg:w-auto text-center leading-6">
                        <span class="text-sm text-gray-500">DIA</span><br>15
                    </span>
                    <div class="flex flex-col justify-center lg:items-center">
                        <p class="lg:text-center lg:h-16 font-thin pb-2">Construção do Templo</p>
                        <img class="w-full" src="{{ asset('img/timeline-3.jpg') }}" alt="Foto da Construção do Templo">
                    </div>
                </div>
                <div class="flex-1 flex lg:flex-col items-center relative px-4 py-6 bg-white">
                    <div class="absolute left-0 lg:left-auto lg:top-0 h-full lg:h-auto lg:w-full border-l-[3px] lg:border-b-[3px] border-cyan-400"></div>
                    <span class="flex-none text-2xl pr-4 lg:pr-0 lg:pb-3 w-[50px] lg:w-auto text-center leading-6">
                        <span class="text-sm text-gray-500">DIA</span><br>20
                    </span>
                    <div class="flex flex-col justify-center lg:items-center">
                        <p class="lg:text-center lg:h-16 font-thin pb-2">Projeto Missionário na Índia</p>
                        <img class="w-full" src="{{ asset('img/timeline-4.jpg') }}" alt="Foto do Projeto Missionário na Índia">
                    </div>
                </div>
                <div class="flex-1 flex lg:flex-col items-center relative px-4 py-6">
                    <div class="absolute top-0 left-0 h-1/2 lg:h-auto lg:w-1/2 border-l-[3px] lg:border-b-[3px] border-cyan-400"></div>
                    <span class="flex-none text-2xl pr-4 lg:pr-0 lg:pb-3 w-[50px] lg:w-auto text-center leading-6">
                        <span class="text-sm text-gray-500">DIA</span><br>25
                    </span>
                    <div class="flex flex-col justify-center lg:items-center">
                        <p class="lg:text-center lg:h-16 font-thin pb-2">Projeto Social no Anexo do Templo</p>
                        <img class="w-full" src="{{ asset('img/timeline-5.jpg') }}" alt="Foto do Projeto Social no Anexo do Templo">
                    </div>
                </div>
            </section>
        </div>
    </section>

    <section class="container mx-auto max-w-[1280px]">
        <div class="flex flex-wrap lg:my-6">
            <article class="flex flex-wrap flex-col gap-10 bg-gray-100 px-5 py-8 md:p-10 lg:gap-16 lg:bg-gray-50 lg:flex-1 lg:order-2">
                <section>
                    <h3 class="pb-2 text-center lg:text-left lg:indent-4 lg:text-xl">GRATIDÃO</h3>
                    <p class="font-thin text-justify indent-4">
                        A gratidão enche a alma, enquanto a ingratidão fecha as janelas da alma, não permitindo que
                        brilhe a luz de Deus, transformando a vida em neblina. Para o crente, toda circunstância deverá
                        ser causa de louvor.</p>
                </section>
                <section>
                    <h3 class="pb-2 text-center lg:text-left lg:indent-4 lg:text-xl">FIRMES E CONSTANTES</h3>
                    <p class="font-thin pb-4 text-justify indent-4">Portanto, te convido a continuar neste projeto,
                        grandes coisas fez o Senhor por nós, não vamos parar. Não obstante a situação atual Deus vai
                        mudar a história de muitas pessoas.</p>
                    <p class="font-thin pb-4 text-justify indent-4">
                        Insisto em dizer, o mundo precisa somente de Jesus!
                    </p>
                    <p class="font-thin pb-4 indent-4">Pr. Samuel Novais</p>
                </section>
                <section>
                    <p class="text-justify indent-4 font-thin lg:text-[1.1em]">
                        <cite>"Deus ama ao que dá com alegria.." &#8212; 2 Coríntios 9:7</cite>
                    </p>
                </section>
            </article>

            <article class="flex flex-wrap flex-col gap-10 bg-white px-5 py-8 md:p-10 font-thin lg:flex-1 lg:order-1">
                <section>
                    <p class="text-justify indent-4 lg:text-[1.1em]">
                        <cite>"Portanto ide, fazei discípulos de todas as nações, batizando-os em nome do Pai, e do
                            Filho, e do Espírito Santo; Ensinando-os a observar todas as coisas que eu vos tenho
                            mandado; E eis que eu estou convosco todos os dias, até a consumação dos séculos."
                            &#8212; Mateus 2:19-20</cite>
                    </p>
                </section>
                <section>
                    <p><img class="w-[75px] lg:w-[90px] inline mb-2" src="{{ asset('img/logo-pix.png') }}" alt="Pix">
                    </p>
                    <p class="uppercase">Igreja Evangélica Ministério Semeando a Verdade</p>
                    <p><strong>CNPJ:</strong> 23.244.224/0001-44</p>
                </section>
                <section>
                    <p><img class="w-[75px] lg:w-[90px] inline mb-2"
                            src="{{ asset('img/logo-brb.png') }}" alt="BRB"></p>
                    <p class="uppercase text-sm lg:text-base"><strong>Banco de Brasília - BRB - 070</strong></p>
                    <p><strong>Ag:</strong> 0086</p>
                    <p><strong>CC:</strong> 002394-0</p>
                </section>
                <section>
                    <p><img class="w-[75px] lg:w-[90px] inline mb-2"
                            src="{{ asset('img/logo-cef.png') }}" alt="CEF">
                    </p>
                    <p class="uppercase text-sm lg:text-base"><strong>Caixa Econômica Federal - CEF - 104</strong></p>
                    <p><strong>Ag:</strong> 0630 | Operação: 003</p>
                    <p><strong>CC:</strong> 5029-6</p>
                </section>
            </article>
        </div>
    </section>

    <section class="bg-gray-100">
        <div class="container mx-auto max-w-[1280px]">
            <div class="flex flex-col sm:flex-row p-3 md:p-10">
                <div class="flex-1 flex-shrink-0">
                    <div class="flex flex-wrap flex-col gap-2">
                        <div class="bg-white border border-gray-200 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="dizimo" name="tipo" value="dizimo">
                            <label for="dizimo">Dízimo</label>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="oferta" name="tipo" value="oferta">
                            <label for="oferta">Oferta</label>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="almoco" name="tipo" value="almoco">
                            <label for="almoco">Almoço de domingo</label>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="sharon" name="tipo" value="sharon">
                            <label for="sharon">Projeto Sharon</label>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="outros" name="tipo" value="outros">
                            <label for="outros">Outros</label>
                        </div>
                    </div>

                    <div id="campoValor" class="hidden flex flex-col mt-4">
                        <label for="valor" class="text-sm text-gray-700 pb-1">Valor (R$):</label>
                        <input class="border border-gray-200 rounded-md max-w-sm mask-money"
                               type="tel" name="valor" id="valor"
                               data-thousands="." data-decimal=","/>
                    </div>

                    <div class="mt-4">
                        <button onclick="montarUrl()"
                                class="bg-blue-800 hover:bg-blue-900 focus:bg-blue-900 text-white px-4 py-2 md:px-10 md:py-3 rounded-md">
                            Gerar QrCode PIX
                        </button>
                    </div>
                </div>

                <div class="hidden sm:block flex-1 mt-4 sm:px-6 sm:mt-0" id="qrcode">
                    <img src="{{ asset('img/qr-code-empty.jpg') }}">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('add-scripts')
    <script src="{{ asset('js/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        let clipboard = new ClipboardJS('.btnCopy');

        clipboard.on('success', function (e) {
            $('#messageCopyText').html('<ion-icon name="checkmark-outline"></ion-icon> Código copiado!');
            $('#messageCopyText').addClass('text-green-700');
            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            $('#messageCopyText').html('<ion-icon name="close-outline"></ion-icon> Não foi possível copiar o código.');
            $('#messageCopyText').addClass('text-red-700');
        });

        $(document).ready(function () {
            $('.mask-money').maskMoney();

            $('input[type=radio][name=tipo]').change(function () {
                $('#campoValor').removeClass('hidden');
                $('#valor').val('');
                $('#qrcode').html('<img src="{{ asset('img/qr-code-empty.jpg') }}">');
                if (this.value === 'almoco') {
                    $('#campoValor').addClass('hidden');
                }
            });
        });

        function montarUrl() {
            let url = null;
            let tipo = $('input[name=tipo]:checked').val();
            let valor = $('#valor').val();

            switch (tipo) {
                case "dizimo":
                    url = 'pix?valor=' + valor + '&descricao=Dizimo';
                    break;
                case "oferta":
                    url = 'pix?valor=' + valor + '&descricao=Oferta';
                    break;
                case "almoco":
                    url = 'pix?valor=13&descricao=Almoco';
                    break;
                case "sharon":
                    url = 'pix?valor=' + valor + '&descricao=Projeto Sharon';
                    break;
                default:
                    url = 'pix?valor=' + valor + '&descricao=Outros';
            }

            getImgQrCode(url);
        }

        function getImgQrCode(url) {
            $.ajax({
                type: "GET",
                url: url,
                // dataType: "json",
                success: function (response) {
                    $('#qrcode').show();
                    $('#qrcode').html(response);
                }
            });
        }
    </script>
@endsection
