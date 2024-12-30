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

        .container {
            padding: 48px;
            text-align: center;
        }

        .igreja-titulo {
            font-size: 28px;
            text-align: center;
            line-height: 18px;
        }

        .igreja-subtitulo {
            font-weight: lighter;
        }

        h1, h2 {
            line-height: 0.7em;
            font-size: 56px;
            font-style: italic;
            font-family: "Times New Roman", serif;
            letter-spacing: -1px;
        }

        h1 {
            text-transform: uppercase;
        }

        p {
            font-size: 18px;
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
        <div><img width="36" src="{{ public_path('img/logo-vazada.png') }}" alt="logo" style="padding: 20px;"></div>
        <div class="igreja-titulo">Igreja Evangélica Ministério Semeando a Verdade</div>
        <div class="igreja-subtitulo">
            PA 03 Lote 02 - Jardins Mangueiral - DF &nbsp;&nbsp;&nbsp;&nbsp; CNPJ: 23.244.224/0001-44
        </div>
        <h1>{{ $titulo }}</h1>
        <p>{{ $fraseInicial }}</p>
        <h2>{{ $nome }}</h2>
        <p style="width: 82%; margin: 0 auto;">{!! $mensagem !!}</p>
        @if($nomeAssinatura)
            <div style="position: absolute; bottom: 66px; margin-right: auto; left: 0; right: 0; text-align: center;">
                <div>_______________________________________</div>
                <div class="assinatura">{{ $nomeAssinatura }}</div>
                <div class="cargo">{{ $cargoAssinatura }}</div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
