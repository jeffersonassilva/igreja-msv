@extends('layouts.default')

@section('content')
    <section class="p-3 md:p-10 bg-gray-100">
        <div class="container mx-auto max-w-[1280px]">
            {{--            <h3 class="titulo-separador">Ofertas</h3>--}}
            <div class="flex flex-col sm:flex-row sm:my-6">
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
                        <input class="border border-gray-200 rounded-md max-w-sm"
                               type="tel" name="valor" id="valor"
                               data-thousands="." data-decimal="," />
                    </div>

                    <div class="mt-4">
                        <button onclick="montarUrl()"
                                class="bg-blue-900 text-white px-4 py-2 md:px-10 md:py-3 rounded-md">
                            Gerar QrCode
                        </button>
                    </div>
                </div>

                <div class="flex-1 mt-4 sm:px-6 sm:mt-0" id="qrcode">
                    <img src="https://fakeimg.pl/300x300/fff/fff/">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('add-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#valor').maskMoney();

            $('input[type=radio][name=tipo]').change(function () {
                $('#campoValor').removeClass('hidden');
                $('#valor').val('');
                $('#qrcode').html('<img src="https://fakeimg.pl/300x300/fff/fff/">');
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
                    $('#qrcode').html(response);
                }
            });
        }

        function copyQrCode() {
            /* Get the text field */
            let copyText = document.getElementById("qrCode");
            let spanCopyText = document.getElementById("retornoCopyQrCode");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.innerText).then(function() {
                spanCopyText.innerHTML = '<ion-icon name="checkmark-outline"></ion-icon> Código copiado!';
                spanCopyText.classList.add('text-green-700');
            }, function() {
                spanCopyText.innerHTML = '<ion-icon name="close-outline"></ion-icon> Não foi possível copiar o código.';
                spanCopyText.classList.add('text-red-700');
            });
        }
    </script>
@endsection
