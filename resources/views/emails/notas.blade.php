<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exemplo Jeff</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6em;">
<table style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #f9f9f9; border-collapse: collapse;">
    <tbody>
    <tr>
        <td style="width: 1%; padding: 20px 40px; background-color: #e5eab3; color: #fff;">
            <img src="https://site.igrejamsv.org/img/logo-preta.png" alt="logo" width="120">
        </td>
        <td style="padding: 20px 40px; background-color: #e5eab3; color: #12120f; text-align: right;">
            <span style="font-size: 1.8em; font-weight: bold;">Tesouraria</span><br />
            <span>{{ $content['as'] }}</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 20px;">
            <p style="font-size: 1.4em; font-weight: bold;">Olá!</p>
            <p>
                Este e-mail é para informar que uma nota fiscal foi adicionada no sistema.<br />
                Confira abaixo os dados cadastrados:
            </p>
            <p style="margin: 40px 0;">
                <span><strong>Responsável: </strong>{{ $content['responsavel'] }}</span><br />
                <span><strong>Cartão: </strong>{{ $content['cartao'] }}</span><br />
{{--                <span><strong>Valor: </strong>R$ 285,37</span><br />--}}
                <span><strong>Data: </strong>{{ date('d/m/Y', strtotime($content['data'])) }}</span><br />
                <span><strong>Descrição: </strong>{{ $content['descricao'] }}</span><br />
                <span><strong>Categoria: </strong>{{ \App\Helpers\Strings::getNomeCategoria($content['categoria']) }}</span><br />
                <span><strong>Observações: </strong>{{ $content['observacao'] }}</span><br />
                <span><strong>Anexo: </strong>{{ $content['as'] . '.jpg' }}</span><br />
            </p>
            <p>Os dados também estão disponíveis no sistema da igreja, e você pode acessar <a href="{{ url('admin/notas-fiscais') }}" style="color: #4a6ec6; font-weight: bold;">clicando aqui</a>.</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="background: #eeeeee; color: #5c5c5c; text-align: center; font-size: 0.7em; line-height: 1.4em; padding: 15px;">
            <span style="font-weight: bold;">Igreja Ministério Semeando a Verdade</span><br />
            PA 03 Lote 02 - Jardins Mangueiral - DF
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
