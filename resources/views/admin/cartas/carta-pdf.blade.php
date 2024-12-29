<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta</title>
    <style>
        @page {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        * {
            line-height: 1.6em;
        }

        #wrapper {
            width: 100%;
            height: 100%;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.03;
            z-index: -1;
            pointer-events: none;
        }
        .watermark img {
            width: 450px;
        }

        .container {
            padding: 4rem 5rem;
            box-sizing: content-box;
        }

        .logo {
            text-align: center;
            position: absolute;
        }

        .igreja-titulo {
            font-size: 22px;
            margin-left: 85px;
        }

        .igreja-subtitulo {
            font-weight: lighter;
            margin-left: 85px;
            font-size: 14px;
            color: #444;
        }

        .igreja-cnpj {
            font-weight: lighter;
            margin-left: 85px;
            font-size: 14px;
            color: #444;
        }

        .igreja-site {
            font-size: 14px;
            margin-left: 85px;
            color: #444;
        }

        h1 {
            line-height: 0.9em;
            font-size: 32px;
            text-align: center;
            letter-spacing: -1px;
        }

        p {
            font-size: 18px;
            line-height: 2rem;
            text-indent: 1.6rem;
            text-align: justify;
            margin-bottom: 32px;
        }

        .assinaturas {
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            font-weight: bold;
            font-style: italic;
            /*letter-spacing: -1px;*/
        }

        .cargos {
            font-size: 12px;
            line-height: normal;
            font-style: italic;
        }
    </style>
</head>
<body>
<div id="wrapper">
{{--    <div class="watermark">--}}
{{--        <img src="{{ public_path('img/logo-vazada.png') }}" alt="Marca D'água">--}}
{{--    </div>--}}
    <div class="container">
        <div class="logo">
            <img width="70" src="{{ public_path('img/logo-vazada.png') }}" alt="logo">
        </div>
        <div class="igreja-titulo">
            Igreja Evangélica Ministério Semeando a Verdade
        </div>
        <div class="igreja-subtitulo">
            PA 03 Lote 02 - Jardins Mangueiral - DF
        </div>
        <div class="igreja-cnpj">
            CNPJ: 23.244.224/0001-44
        </div>
        <div class="igreja-site">
            (61) 99689-9317&nbsp;&nbsp;&bullet;&nbsp;&nbsp;www.igrejamsv.org.br
        </div>
        <div>
            <h1 style="margin: 60px 0;">{{ $titulo }}</h1>
            <p>Queridos irmãos,</p>
            <p>É com satisfação que a Igreja Evangélica Ministério Semeando a Verdade vem, através desta carta,
                recomendar que os irmãos desta estimada igreja recebam
                {{ $cargo }}
                <strong>{{ $nome }}</strong>, que se encontra em plena comunhão com nossa congregação e tem demonstrado
                um compromisso exemplar na obra do Senhor.
            </p>
            <p>Estamos confiantes de que sua presença em vosso meio será
                uma bênção, contribuindo para o avanço do Reino de Deus com dedicação e zelo.
            </p>
            <p>Aproveitamos a oportunidade para expressar nossas cordiais saudações e desejar que a graça e a paz
                do nosso Senhor Jesus Cristo estejam com todos os irmãos desta amada igreja.
            </p>
        </div>
        @if($nome_assinatura1)
            <div style="margin-top: 60px; text-align: center;">
                <div>_______________________________________</div>
                <div class="assinaturas">{{ $nome_assinatura1 }}</div>
                <div class="cargos">{{ $cargo_assinatura1 }}</div>
            </div>
        @endif
        @if($nome_assinatura2)
            <div style="margin-top: 50px; text-align: center;">
                <div>_______________________________________</div>
                <div class="assinaturas">{{ $nome_assinatura2 }}</div>
                <div class="cargos">{{ $cargo_assinatura2 }}</div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
