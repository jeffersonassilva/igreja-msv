@extends('layouts.default')

@section('content')
    <section class="p-3 md:p-10">
        <div class="container mx-auto max-w-[1280px]">
            {{--            <h3 class="titulo-separador">Ofertas</h3>--}}
            <div class="flex flex-col sm:flex-row sm:my-6">
                <div class="flex-1 flex-shrink-0">
                    <div class="flex flex-wrap flex-col gap-2">
                        <div class="bg-gray-100 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="dizimo" name="tipo" value="dizimo">
                            <label for="dizimo">Dízimo</label>
                        </div>
                        <div class="bg-gray-100 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="oferta" name="tipo" value="oferta">
                            <label for="oferta">Oferta</label>
                        </div>
                        <div class="bg-gray-100 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="almoco" name="tipo" value="almoco">
                            <label for="almoco">Almoço de Domingo</label>
                        </div>
                        <div class="bg-gray-100 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="sharon" name="tipo" value="sharon">
                            <label for="sharon">Projeto Sharon</label>
                        </div>
                        <div class="bg-gray-100 rounded-md flex items-center gap-2 p-3">
                            <input type="radio" id="outros" name="tipo" value="outros">
                            <label for="outros">Outros</label>
                        </div>
                    </div>

                    <div id="campoValor" class="hidden flex flex-col mt-4">
                        <label for="valor" class="text-sm text-gray-700 pb-1">Valor (R$):</label>
                        <input class="border border-gray-300 rounded-md max-w-sm"
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
                    <img src="https://fakeimg.pl/350x350/f2f2f2/eae0d0?text=Pix MSV">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('add-scripts')
    <script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#valor').maskMoney();

            $('input[type=radio][name=tipo]').change(function () {
                $('#campoValor').removeClass('hidden');
                $('#valor').val('');
                $('#qrcode').html('<img src="https://fakeimg.pl/350x350/f2f2f2/eae0d0?text=Pix MSV">');
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
    </script>
@endsection
