@extends('layouts.default')

@section('content')
    <section class="p-3 md:p-0 md:py-10">
        <div class="container mx-auto max-w-[1280px]">
            {{--            <h3 class="titulo-separador">Ofertas</h3>--}}
            <div>
                <input type="radio" id="dizimo" name="tipo" value="dizimo">
                <label for="dizimo">Dízimo</label>
            </div>
            <div>
                <input type="radio" id="oferta" name="tipo" value="oferta">
                <label for="oferta">Oferta</label>
            </div>
            <div>
                <input type="radio" id="almoco" name="tipo" value="almoco">
                <label for="almoco">Almoço de Domingo</label>
            </div>
            <div>
                <input type="radio" id="sharon" name="tipo" value="sharon">
                <label for="sharon">Projeto Sharon</label>
            </div>
            <div>
                <input type="radio" id="outros" name="tipo" value="outros">
                <label for="outros">Outros</label>
            </div>

            <div id="campoValor" class="hidden">
                <label for="valor">Valor (R$)</label>
                <input type="text" name="valor" id="valor"/>
            </div>

            <div>
                <button onclick="montarUrl()"
                        class="bg-blue-900 text-white px-4 py-2 mb-10 md:px-10 md:py-3 md:mb-6 lg:ml-6 2xl:ml-10 rounded-md">
                    Gerar QrCode
                </button>
            </div>

            <div id="qrcode">
{{--                <img src="https://fakeimg.pl/350x350/282828/eae0d0">--}}
            </div>
        </div>
    </section>
@endsection

@section('add-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('input[type=radio][name=tipo]').change(function () {
                $('#campoValor').removeClass('hidden');
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
                    url = 'pix?valor=' + valor + '&descricao=outros';
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
                    // console.log('aqui');
                    // $('#qrcode').html('teste');
                }
            });
        }

        // setTimeout(function () {
        //     getImgQrCode();
        // }, 1000);

    </script>
@endsection
