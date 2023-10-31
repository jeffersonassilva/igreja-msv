<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nota Fiscal</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6em;">
<table style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #f9f9f9; border-collapse: collapse;">
    <tbody>
    <tr>
        <td style="width: 1%; padding: 20px 40px; background-color: #b3dcea; color: #fff;">
            <img src="https://site.igrejamsv.org/img/logo-preta.png" alt="logo" width="100">
        </td>
        <td style="padding: 20px 40px; background-color: #b3dcea; color: #12120f; text-align: right;">
            <span style="font-size: 1.5em; font-weight: bold;">Secretaria</span><br />
            <span>Novo Visitante</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 20px;">
            <p style="font-size: 1.4em; font-weight: bold; color: black;">Olá!</p>
            <p style="color: black;">
                Este e-mail é para informar que um novo visitante foi adicionado no sistema.<br />
                Confira abaixo os dados cadastrados:
            </p>
            <p style="margin: 40px 0;">
                <span style="color: black;"><strong>Data da visita: </strong>{{ $visitante['dt_visita'] ? date('d/m/Y', strtotime($visitante['dt_visita'])) : null }}</span><br />
                <span style="color: black;"><strong>Nome: </strong>{{ $visitante['nome'] }}</span><br />
                <span style="color: black;"><strong>Sexo: </strong>{{ $visitante['sexo'] ? $visitante['sexo'] === 'M' ? 'Masculino' : 'Feminino' : null }}</span><br />
                <span style="color: black;"><strong>Data de nascimento: </strong>{{ $visitante['dt_nascimento'] ? date('d/m/Y', strtotime($visitante['dt_nascimento'])) : null }}</span><br />
                <span style="color: black;"><strong>Endereço: </strong>{{ $visitante['endereco'] }}</span><br />
                <span style="color: black;"><strong>Telefone: </strong>{{ $visitante['telefone'] }}</span><br />
                <span style="color: black;"><strong>É WhatsApp? </strong>{{ !is_null($visitante['whatsapp']) ? $visitante['whatsapp'] ? 'Sim' : 'Não' : null }}</span><br />
                <span style="color: black;"><strong>É batizado nas águas? </strong>{{ !is_null($visitante['batizado']) ? $visitante['batizado'] ? 'Sim' : 'Não' : null }}</span><br />
                <span style="color: black;"><strong>Observações: </strong>{{ $visitante['observacao'] }}</span><br />
            </p>
            <p style="color: black;">Os dados também estão disponíveis no sistema da igreja.<br/>
            Você pode acessar <a href="{{ url('admin/visitantes') }}" style="color: #4a6ec6; font-weight: bold;">clicando aqui</a>.</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="background: #eeeeee; color: #5c5c5c; text-align: center; font-size: 0.9em; line-height: 1.4em; padding: 15px;">
            <span style="font-weight: bold; font-size: 1em; color: #5c5c5c;">Igreja Ministério Semeando a Verdade</span><br />
            PA 03 Lote 02 - Jardins Mangueiral - DF
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
