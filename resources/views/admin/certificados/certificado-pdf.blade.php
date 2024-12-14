<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <style>
        @page {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        #wrapper {
            background-image: url("{{ public_path('img/diploma-fundo.png') }}");
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
        }

        * {
            line-height: 1.5em;
        }

        /*body {*/
        /*    font-family: 'Arial', sans-serif;*/
        /*    color: #111827;*/
        /*    background-color: #f5f5a4;*/
        /*    !*color: #111111;*!*/
        /*    !*margin: 0cm;*!*/
        /*    !*line-height: 1.3rem;*!*/
        /*}*/

        /*html, body {*/
        /*margin: 0;*/
        /*padding: 0;*/
        /*height: 100%;*/
        /*width: 100%;*/
        /*background-color: #e5eab3;*/
        /*}*/

        /*body {*/
        /*    font-family: 'Arial', sans-serif;*/
        /*    text-align: center;*/
        /*    color: #333;*/
        /*    !*background-color: #f6f6f6;*!*/
        /*}*/

        .container {
            padding: 75px 50px;
            text-align: center;
            /*box-sizing: content-box;*/
            /*position: relative;*/
            /*height: 100%;*/
            /*text-align: center;*/
        }

        .igreja-titulo {
            font-size: 28px;
            text-align: center;
        }

        .igreja-subtitulo {
            font-weight: lighter;
        }

        h1, h2 {
            line-height: 0.8em;
            font-size: 58px;
            font-style: italic;
            font-family: "Times New Roman", serif;
            letter-spacing: -1px;
        }

        h1 {
            text-transform: uppercase;
        }

        p {
            font-size: 24px;
        }

        .assinatura {
            font-family: 'Arial', sans-serif;
            font-size: 18px;
            font-weight: bold;
            font-style: italic;
            /*letter-spacing: -1px;*/
        }

        .cargo {
            font-size: 14px;
            line-height: normal;
            font-style: italic;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div><img width="35" src="{{ public_path('img/logo-vazada.png') }}" alt="logo"></div>
        <div class="igreja-titulo">Igreja Evangélica Ministério Semeando a Verdade</div>
        <div class="igreja-subtitulo">
            PA 03 Lote 02 - Jardins Mangueiral - DF &nbsp;&nbsp;&nbsp;&nbsp; CNPJ: 23.244.224/0001-44
        </div>
        <h1>{{ $titulo }}</h1>
        <p>Certificamos que</p>
        <h2>{{ $nome }}</h2>
        <p style="width: 80%; margin: 0 auto;">{{ $mensagem }}</p>
        @if($nome_assinatura)
            <div style="margin-top: 40px; text-align: center;">
                <div>_______________________________________</div>
                <div class="assinatura">{{ $nome_assinatura }}</div>
                <div class="cargo">{{ $cargo_assinatura }}</div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
