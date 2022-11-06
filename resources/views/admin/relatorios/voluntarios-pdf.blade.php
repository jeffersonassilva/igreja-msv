<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style type="text/css">
    body {
        font-family: 'Arial', sans-serif;
        color: #111827;
    }

    .title {
        font-weight: bold;
        font-size: 20px;
    }

    .text-center {
        text-align: center;
    }

    table {
        width: 100%;
    }

    table, th, td {
        border-collapse: collapse;
    }

    th, td {
        border-bottom: 1px solid #aaaaaa;
    }

    th {
        padding: 10px;
        background: #cccccc;
    }

    td {
        padding: 10px;
        color: #1f2937;
    }

    @page {
        margin: 120px 50px;
    }

    header {
        position: fixed;
        top: -90px;
        left: 0;
        right: 0;
    }

    .footer {
        font-size: 12px;
        position: fixed;
        bottom: -80px;
        height: 20px;
        width: 100%;
    }

    .footer-left {
        float: left;
        color: #6B7280;
    }

    .footer-left span {
        background-color: #e9e9e9;
        color: #333333;
        padding: 3px;
    }

    .footer-right {
        float: right;
    }

    footer .pagenum:before {
        content: counter(page);
    }
</style>
<body>

<header>
    <table>
        <tr>
            <td style="border: 0;">
                <img
                    width="115" height="50"
                    src="data:image/png;base64,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"
                    alt="logo">
            </td>
            <td style="border: 0; text-align: center;" class="title">
                {{ $title }}
                <br>
                <span style="font-size: 16px; font-weight: normal;">
                    {{ $periodo }}
                </span>
            </td>
            <td style="border: 0; text-align: right; font-size: 12px; color: #374151;">
                <div class="impressao" style="font-weight: bold;">Data de Impressão</div>
                <div class="impressao data">{{ $data }}</div>
            </td>
        </tr>
    </table>
</header>

<footer class="footer">
    <div class="footer-left"><span>P</span> = Presença; <span>F</span> = Falta; <span>FJ</span> = Falta Justificada.</div>
    <div class="footer-right">Página <span class="pagenum"></span></div>
</footer>

<main>
    <table>
        <thead>
        <tr>
            <th style="width: 1px;">#</th>
            <th style="text-align: left;">Nome</th>
            <th>Sexo</th>
            <th>Professor EBD</th>
            <th>P</th>
            <th>F</th>
            <th>FJ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($voluntarios as $key => $voluntario)
            <tr style="{{ $loop->even ? 'background: #eee;' : null  }}">
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $voluntario->nome }}</td>
                <td class="text-center">{{ $voluntario->sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                <td class="text-center">{{ $voluntario->professor_ebd ? 'Sim' : 'Não' }}</td>
                <td class="text-center">{{ $voluntario->presenca }}</td>
                <td class="text-center">{{ $voluntario->falta }}</td>
                <td class="text-center">{{ $voluntario->falta_justificada }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>

</body>
</html>
