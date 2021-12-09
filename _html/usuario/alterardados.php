<?php
    include('../../_php/usuario/verificaruser.php');
    require('../../_php/vendor/autoload.php');
try
{
    $client = new GuzzleHttp\Client([
        'verify' => false
    ]);

    $resposta = $client->request(
        'GET',
        'https://api-quem-da-mais.herokuapp.com/usuarios/usuario/' . $emailUser . '/' . $senhaUser // URI da Api'
    );

    $dados = json_decode($resposta->getBody());
    // VARIAVEIS DADOS DO USUÁRIO
    $nome_cadr = $dados->nome;
    $email_cadr = $dados->email;
    $cpf_cadr = $dados->cpf_cnpj;
    $telefone_cadr = $dados->telefone;
    $membrodesder = $dados->criacao_conta;
    $data_nascimento = $dados->data_nascimento;
    $endereco_cadr = $dados->endereco;
    $site = $dados->link;
    $adDestaque = $dados->destaque_produto;
    $avatarr = $dados->path_avatar;
    $codigo = $dados->cod_validacao;

    if($adDestaque == 'off') {
        $adDestaquer = 'Não';
    } else {
        $adDestaquer = 'Sim';
    }
    

    // Inverter data
    function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }

    $data_nascimentor = inverteData($data_nascimento);
}
catch (Exception $e)
{
    echo "Ops, algo deu errado, por favor, faça login novamente";
    header('refresh: 0.5; url=./loging.html');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../_css/usuario/alterar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=PT+Sans+Narrow&family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>Bem vindo</title>
</head>

<body>
<div id="barracor">
    <a href="../../_html/usuario/indexlogado.php"><img style="width:90px; margin-left: 40px; margin-top: 5px;" src="../../_img/logoquemdamais.png" alt=""></a>
</div>
<div class="divmenu">
<nav class="menu">
			<ul>
				<li><img style="position: absolute; margin-top:3px; width:35px; margin-left: -35px;"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAE0UlEQVR4nO3bW6xcUxzH8TXq2tYtLlHxUJdEpInrg2pIqWoIQsQRl0Rckop4qFAqIdLgwQMP9aRKBJGIhIhLgoZIL5Q0LlFBEJcQUhqte9vjfDysdZx9jtOZOTN7Zu+j6/syk5m91v+/fvPf//Vfa+0JIZPJZDKZTCazM9Ko0jjWhhDmVOlDE9Y0Go3TWl1UtYCqtN+KRqPRUp9d++FIK9pxtJ9M5IfdpZeO7AxkAbskC9gltRMQa7G6yferTZwd9tcttRMwhDAUQih7dq71bN8xw+FRtR9jmYhfdYzASUXtBGyVA+tG7QQMvcmB/09yDszUT8CcA7sn58B2yTkwUz8Bcw7snpwD2yXnwEz9BMw5sHtyDmyXnAMzWcBuyQJ2SS2eTKhjHmyXqiNwTcX2mzFpSqlJTWkP9WBqCOGMEMKCEMK8EMLhIYRtIYQvQwivhxCWNxqNz8uy978Ax+AmvIo/WzwdMIRncWLVflcG9saFeBBfjRFoEOuwFCdjGvbHHCzHHwUhX8TsqsfTF3AEFmEl/hoj2o94Ggsxo0U/ByVxNxfar8H5/RpL30kRVWS7+HDP7TgJE86hOBD3YEuh31U4qxdjqBSsx7d4BAPYr8S+98Od2FQQch3O6+SH2WlJefU2bCwI+S4uQtV16uQBe6Rc+m1ByA24ElOq9m/SgD1xA74pCPlhSiE5ItsFu6fo+7wg5Ec5IidIEvI6o+vODTi7pP73wlV4SSyxfsVrOLeM/mtDEnJhQcgh3NFFf0fhvlQFbDc+d5c5hlqA3XAztiURF0yg7RRcgFdS22Gew+k4FDNwi5FFQ70iUUmnblicBvhKG9ceIhb/xYnpdzyMk3bQ5tZ03Wvd+loq4kpmVXrfsZg4IA3wpybXzMVT2FoQ7hPcqMWiIEUj/NKJf32hGzHFJSF8N+bzfcQyaENBtO14BvO1ucop9L+p2XWVbumP+Tvpv+fB4t9gh1r83fSa9LoytTk2hHB9COGKEMLe6bvvQwgrQggPNRqN7/7TQ3OuTq9vTrBd9YyJzMV4R9x3nIWjxTX0YIqQQbxXiLYhvC4W3rt1aH+hOElt1+ttNzQwG/fji5RjFmP/kvp/3Pj8jReMlCCb8QCO6dDOLrgUz6e+t+HKMsYwnrGiaF/vYIC/YwWO69LWrmLp8QTex6d4FHPS9yfgckzrwsY54gbGMB/jzG78Hs9IM9G+Tp/Pxrl42eg6axUu0eEt1StwCt4o+PkNrkV5c4OYd5YavSYdNrYMpxpnZhMr/XuN3u/7Pn12WGkOdoB4lvN04UfehCXYq2xDbzWJtHbLgem43uiyYiue1OdzEczEY2KOI65778I+vTK4Rlx7Tki0Jv3NE+uxwYKY68XF/J5l+T2O3YPT3TJcUG8VJ5yDe2Wzp4jrzaVG70L/nAY5s0Q709OtOXz+8ne6dY8sy0aliLvQAynSFQa5Eud3GvFGdm5+KPS7EseXPYbaIJ7yFc+PiSXLEm0eZom13IBYjw7zJub22v/akPLVEqNLpV+SuLOatJuPDwptNmCgn77XCrGAHjC6ThsSa8yLsK94NHox3i5c8xkuk89PRhDXv8vwmx2zMUXuHlX7W1vEZ20WiZPOFnH9u1bcvppatX+ZTCaTyWQymUwm0x/+Aa/9sMyIIr0SAAAAAElFTkSuQmCC"><a href="#">Anunciar</a>
                    <ul>
                        <li><img style="position: absolute; margin-top:3px; width:29px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAEyklEQVRoge2aTWwVVRTHz7z2NTSlBhZITG2CpkiwDRsWGohxQzERbI3WDzYQF34kFkRdGMpOpUjiwkSX7iAmBGg0oNJoFFNEEz/QxCKBGCXSysIKlJJAq/25uGf67tzOzHvz3sy8LvgnL9N3z5lz/v+Z+3HufRW5hYUFL+2AQFFEekXkURFZKyLtIoKIXBSRH0TkQxH5yPO8mbRzpwagFzhHeZwDeuvNdx6AArDXIvoLsBPoBFr00wm8DIyqzywwCBTqzX8OloibQD/QYNnWALut7w3ADmBa7xmsD2sH2p1mVcSGEHsf8BPgOe3dKmYW6MmPcQiAojUm+h3bCmDE6m4XgIcdn5esMVPMl32QSJ81Jhoc249qGwLeBGaA68Dtlk8jcEb9+vJXUCJyQEnsdNqXWm9iibYN6fcnHN9XtH1/ntwDAM4qiXud9gIwqbbntW0ZcDfQ6vh2qd/ZPLkHYJFtDbFt14EM8A2wOSJGq/pMZs84AnFC1P4g8KXVzT5g/uy1IIT4XauzjN8DwD/qu8mxpdK1al1Vv9frRrsReFrJHRYR8TxvREQ+V7Mr+iG9flcjl+QAWvTqT7+jBFfzNsxiNw3sBp4DJtS3x/JrBH7V9j5tW5KHgEWY+ugPoInggrjD8d1mjSF04L+PVVthai80RlE/fwLv+g8rCxEF4BNN/B+wTtv9EmUa6HbuuQ14GzNrrXBsG3FKFGAtcENzfEYWBSWwVRNcBu5zbINqm8aUHY2WbQPwmvW9Ud9EaNEIrALG1PZkFkK+1eDbQmwFFeOvG6OYFbsLWKyfLuBVSiVJZBkPvKA+X6QtYo0GngAWxfj1UPnGKrLi1S45pWJXpinkPSXwTgW+RcxsdgAzI13Tzxlgv9rKVrqYiQFgX1oimiktZrELX5oA7teclyoRXknAZzTgSAr8kuY+rbkfTyPY1xpsawrckubu19zDSW7aDHylg8zFDWBxhpyjOC3FbKFdTCnXTe4NT1GaOsNwPG8RFrfhGF6z6Frjz+EDYg7rXheR5Z7neSJSFJFLah/LXUEJfu4LItKg3JaLyBtiOA/MeWKmR7DKCOARS/kV4EWgg6xqIAuYc7AOzXnV4tFt+dylbdfsG0/EvL7zMba88HuM7YQt5B7gOPMH+gxwB/AY5vDgtxCfLDCluYY0dzvwb4jPp8St/JTOm45m1HsSQ0kDbE9y09xChNl37APGQ57cJHAk9qmUz3UncIjg3sXHGOY4tonSJu50kuA+moC3yvUDTDHZVoWIVZR2jnEYVC4AJBaif/t7g3Uhfm3AMbUfrEKIf2h3NOxBAOv9N+PyqkaI36VWR/i2q/1KFUL87hT6NoHVlQqpZCt5WK8ngS0451I1wiflnnV5wBYROelwSBg9+EZaCZYJpzA/CTRjBurH2n6oijxH9N5jGqtZY5+y8g2jdV5NXUu/F4Bngb8IxwTQUYWQlcDfETHHNad96lKbEKu9BRgAfsb8RHAVM3UmFmHFbAMOaqzrGnsXIaVQakLqjThesYOdkCm3XijHJXQGWohvw4aW8gGUm34vZ8SlGiTnUm6MZDWGaskb9UbG9cb1IcH8tix2jenmJfhfDFHYkw73DPNiKs29lApGGxeBPUBTBkLqkvcWssD/bMTrcrQENmUAAAAASUVORK5CYII="><a href="../veiculos/anunciosUser.php">Meus anuncios</a></li>
                    </ul>
                </li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAADe0lEQVRoge2YP2wcRRjF35yR7ci2AKVI4STCwgYBDQUWf6xEKAVQIpAVJCRAFCDiJtRQkpiU1ElFESk4jhVhU2BFMTYNoomtdBHEQtiyMDb+QySs2P5R7Le6yd3e3s3drpNin3Ta3Zn53nvfzTe7sysVKFCgQIECzcO1Egy0SXpZ0pCkAUnH7dch6UkbFh//8Y47kv6w3x1JP0v6xTm334qfYADPAN8Ay2SHFeAiMNiMp6AZAQ5JuiBpRFLJmu9K+knSLUmLdv2vpG1Ju5I2bNwTkh6T1COpW1KfpKckvSjpdTuPcVnSZ865reCMGkjCAdft39sFrgAnM+Q/AXwL3DeNWaBUPzJc6EMTWAdey1ygrPMSsGZa7+Uh8KuRf5Q5ebXWiGnNZE08aMR/AZ2ZkifrPQ7cM83nGolptAY/seMl59x/zdlrHM65TUnf2eXHmZACh4ANYB94OhPSxnSHbEZWgY4sCD8wwhsZ+AvVvm3aw1mQ3TSy9zPwFqp91rSnQ4LeAmaA7YSn7g7QnaPnWp4Om3Ylts3rm5UB7wJ7CQExJg86Cc/bDym+9oB3pPJd60s7/0rSEeeck9QuadX6Fw88gzLueh7azNsRRV5LirxH8Mqpz2t728t8AzgD9ANdeTsHukzrjGnHeMMb0xeXmR84kzJ9v6X0HRTSPMz4iQwAU1Qv9F2gl2gNTQC/U37i5ol7pjVh2r3mxcc2MAn0p03t5zZ4KqfqCQblRX82JGjegoaBduACyS9RW8A4MNCCwaPAmHFVYgkYNQ/D1jYfQh6jA/i6Xh0Qbbt7m0jiWcpb9jScNy8ABCdi50t2WfUOQlS7k9Z/pYlErlns90l/BOX91lKlr2YSiUvq+Rpjj1n/RlJ/HZ24nBJnE3ih0UQa2cZfteMccDrUbB3Epqq+HZjWbIWHQPYHZ6QHmPbqdQ44BXQSLdQpax9rQmfcYieNq9O45zy9H7F9XkulZdcl4FOiTzZJWCPtfl5bZwD4uwbnimmWvPGtJeK1dwNfAAtED61NoltncBIeZy/RF5lN41wwjarddmaJPGyk+Upd7MAr+VgKB/BqWn/il8ZHcTZ82Fb+AdS7/a7n5KUZhHupt0byWkOt6NaakWULHEogi9uWQo02gGx1iXac9XAuG+856hJtm0cpbxh9/AmcA9pzSOSh6BYoUKBAgQL/A+WK1ss0UXvoAAAAAElFTkSuQmCC"><a href="#">Categorias</a>
					<ul>
                    <li><img style="position: absolute; margin-top:8px; width:25px; margin-left: -30px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAADBUlEQVRoge2ZT4gWZRzHP89maxJuulbUkiUFdnVBUFoIcqO65CUII8/dPLkVEYYevIsIKt5E2A51MLokdCvotpsU2UVYkEBlX7Y20611Px1mFt5mx9dnZt4/rj0fGN6Xeef7+32/M8/MvPMMJBKJRCKRSCQSiTqEpgXUl4D3gF3ADmADsBl4BBgBhoAn8s1/B1aAP4C7JZ83gcvA1yGEn5p66yrqiHpeXbY3XFJ3DDonAOp29ZceBW1nQX110GGH1R/6EHaVlvpyt/xvqKH5FNhTWDcDnAJ+Bm4BfwF/Av8ArcK2o8Aw8DjwGLAp/z4MvAAcAF5v234rMK3uDSH8XcNvfdQX1duFI/CF+mgHzX+I7PNRyZE+3r0kkagXCyZ+U0fuo6kcONdNF6TL6kTzFPEG3ijZ6wcjdHUDb1HnCvKr6uZmSeKaD6tXCs2/V+97H68bONdOqiuFEufqJ4lv/EnJ8NoVqa0dONefKBlZ71RPEd/wOXWx0PBUBX3TwBvVy4UyN9RnqtaKbfh5odm8uq2CvlHgvMa4ulQodbFOrTXnoLoJ2A28AkwAb9cp3CdOA5eAmRDCXIwgAJhd+T4A3gXGgXveVx9gWmR/gGbbPq+EEO62bxTUUeBbsqedh43bZE9fXwJnQgiLQT0JHBqsr74wC0wGdQ54ftBu+sTJoK7QhYmAdcJcqHurWKc4NGgHfSb83wKTAj/spMAdWAKmgLF8mcrXDYp6ftRrJc+bZRwu0X4Yqe0Fdfy0UM9GNni2pMFYI8vNqOPnqyHgM+DXmDG0zlkEjgyFEK6TPfceB652ELwfua5fVPHzHbAvhPDjml/MpnQOqt8UhsMddSofNmNm58udLg/TKsT4uaDujNp96lNmrzliuaZuiT4+FTGbto29wKretMJU1GqT/a6dSypjSX2zR1nb/bwV6WdZrTc1ZTYBv9Ch+Lz6WpezdfKzL+95L1rq/qZNnlaPqbPqrXyZNXsH1PFVSy8wezf9ccHPjHpUfbLffhKJRCKRSCQSiURi/fMvmg8JptkKt3QAAAAASUVORK5CYII="><a href="../veiculos/categoriaVeiculo.php?categoria_veiculo=sedan">Sedan</a></li>
						<li><img style="position: absolute; margin-top:8px; width:25px; margin-left: -30px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAADTUlEQVRoge2Yz2ucRRzGP5PUpLYYLaWx3SSIhKg5BFoLNSC9tWA9F38c9FAx+gdU4q1UpP9BeoieK+0th7Z48OJBKEUvRS2luRhFIkHNptFsSXw87ETX2Xnffcd9ZzebzgeGnXd+Pc93531n3ncgkUgkEolEtzDtdJZ0GJgBXgUmgaEyTHmoAt8BN4B5Y8xyJJ1sJL0vqarOU5X0XqeDvdSFQF0+7lSwr3U70gbOxg52QNJPjmhV0nlJz0hqa03I0DR27A/U/AgtSXqsbM1GcXd2a5JeiibYrD9tNRt5PabggiM2F00s28Nlx8NCLKEDkjYcsaNRxPJ9HHM8PJR0MIbQjCP0fekixb1863h5t2jfvgCdN53rKwF9y+aqc+16aw9JFUmbzr/6XKkiYX7GJf3V4GVL0kiRvkVn+A2gv+H6tjHmXrDTkjDGLAJfNxT1AYVW66IBu7fMZwX7xcT1UM5tLWlCzUyVMnh7vqY8viZa9dtTYGzfP3cKuCOpHxgDJoBRm4aBI8BTNj1p07bWEP8+HlvUv4QANoFVm36zvz8DvwA/AkvAfWDJGLMFnM7w+lFeMC1fBe3284Knahk4AAy0GqNkasDvwNOeurvGmMm8zrkBS3qR/y4OvcBxY8w3WZWZi5akYaDjr44lMCfpUFald4Zth1vAs7FcRWYRmDbGrLgVWTP8Kb0bLMA48ImvommGJZ0EvoztqEO8bIz5qrHAN8PnOmSmE7zjFvgCPpHR+SEwC4zY9KEty+I6MGoCob6v38wZN8RH68MJSeueNxhJmvW0nc1oK0mjLcWyPYzljBvi40ERsSwqnraVLgQc5MNtG/I9HMr8/wla0hgwH8EPEBbwW56yt3PanwGWcmYqa0Z+AF4p0Uc+OV5qqj8rFZtm1XyC2AmCfLjx+fbhpka9jF35/yHmM7wjSQHvdlLAu51HLuAih3guF4B91A/jBoEn7PUg9fOt/bbdoC1383uBx23+T2DD5v+gfl7l5tepfxzUbPmazVft9cUQ88H7sLuvdZtQv4/cLe0LeC2n/WosI20Q5NcX8Bc5A3webCc+7fmV9LykXz3v4Stq4xs3FqX4Vf0D/JqkVZuu7sRgt+k1v4lEIpFIJBK7k78BMDuS2uOWW/oAAAAASUVORK5CYII="><a href="../veiculos/categoriaVeiculo.php?categoria_veiculo=hatch">Hatch</a></li>
						<li><img style="position: absolute; margin-top:8px; width:25px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACO0lEQVRoge2YO2tUQRiG31k0KWK2iKBJayGCjfYiWmhh42W1tLOJ+gMUmxTiH7C1UTsJBPwDNl5SmCgk8V5lveIlRRS8gI/FfgvHuLPOmTMb12UemOp87/d+75kzcM6RMplMJpPJdAYYBaaAx8A30vEGuA5sX48Q48BiwuE78QU40OsgN83sIbAHGArUAdDleg3YCUxb6SqwK93kv5vtM5NPwNaS2q5BCnUOuGrly8BE/MR+k1tmcCFCGxTEajcWvOaAkfLT+pu3d+MDUI/QBwex+s3Ac5NNA7Wynr7G7Tt0PlJfKohpdgArJr0Y47u2YXE3RiN7lA5iuoPAD5OfjPEuNmvvxrkKPaKCmPaUyb8D+2MH2GtN3gObopqoWhDTXy7Msa2s3gEzko7EDtAjViUtSFqytShpyTn31idwwDtJW9Znvsp8lIWSdFvSjHPuq9QKEv049AEvJB12zj3634NI0oqk3YMQRJKuDEqQ14MS5Gea95t/T21QgigH6Tf+FqQp6bikuq1jkp72eqgoX/wsA2Md6seAZhddVaJ8ResnQCcaXcKfSD9/Jd+XAm54Lno/sIB6TyLE+17aIGlSEpIOSQr9HnGBdalZ6/tK0jVJU39UAnct5VFfN6BhNXdSTZjcFzhjxU/wH7pnVjNZcf5Y39MhDYeAeRM0aR2wuq1Godl9Av9CBgYJ9Z0L9gUmgAeeg9VuNp4qRAnf+dK+wDBwFpgFPtu6Z49Asp0o6TvcK99MJpPJZDL9xC9l4zd9OiMg0AAAAABJRU5ErkJggg=="><a href="../veiculos/categoriaVeiculo.php?categoria_veiculo=suv">SUV</a></li>
						<li><img style="position: absolute; margin-top:4px; width:25px; margin-left: -28px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAADOElEQVRoge2YS4gcVRSGv9OoMOMEHxkFdRE3IoOiiHERMLMS3CkuHKPRjYjLISIEDK5cSFxkmxgnyUJwExDiYjC+RhwjKBgQTSJMQJBEcZGXBhOSMPO5qDtQ6FR3pas6Npn7QdPVfc/9z3+66ladvpDJZDKZTCaTyWQymUwmk8lkMplMJtMW0bageiPwPPAQsKbmtCXgJHAMmI2Iy237GgjqmPqDzfhdfWFQHm9oWW8r8HA6XgDO/2t8HFiXjg+Xvu8A9wB3AncBH6jrgdcjwpY9tof6WTpLH1aMv7p8GivGJ9WjpbO9vW2PnZb1bkvvp/qZHBHzwAbgUPpqq7qpDWPLtF1wYyLiL+Bp4BeKm+pe9ZG29IeuYICIOAM8A/wNjAKz6r1taA9lwQAR8SPwIrBIcSM7qI431R3aggEi4gDwMiBwPzCv3t1Ec6gLBoiI94E308cJ4Ev1sb71ANRbgG0U62YdcFNDn4NmiaIr+ya95iLitzoTQ72V4jHwwOD8DRyB74EDwEcRcbQqMNR3KDqk64njwF5gT0ScLg+EugDc97/YGjwXgZ3AW+n5TqiXGP4125Q/gFciYjaq+trrkEXgqdVUMMDPq61gh77xaJlYbQUPf2vZNrngLvwETAFrgRFgPbCPoq27VgjsAR5NHtYCzwGVreR/FerxsTpSMf8ldekqdyb7YUndXOFhRD1YRwR7mz2r3t7jR9vXqJR6zPTwMK6e66FxuUOxndqN/WnLpRu7eoy3wbvdBiPiFLC/h8bhDrCjR1Cd9XGkRkxT6vjoFnMF2NKJiBlgM8XG+KUVAkdrJLq5RkxT6uRYKeYK8C2wMSK+q5ypzqfr/vNeWdRNpXUyUcNYLdSJku5Ujfi5FPtVP8leKyV7okvcqHosxdV/PNT3sax9xIonRYp7suR3up9Ea9QTSeD0SkWrd6iflhI9e9WJevuYKul/4gpbtanYMynmV3Ws32ST6oVSwi/UN9Rp9T31z9LY7sbVVfuYKeU5l3JPJy9zpbEL6uNNk02qJ61mUX1bB/fPS+2o21OuKk6oG9tKOGaxpg9ZNCIX1QV1l3rNdjvVB1PO48nDWfVrdUvdy/gf/NMIZ41QR3YAAAAASUVORK5CYII="><a href="../veiculos/categoriaVeiculo.php?categoria_veiculo=picape">Picape</a></li>
					</ul>
				</li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -33px;"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAADgElEQVRoge2YO2gUURSGd02IYh5EEqIEgo8isQpELCTGEE1hGiGFjRaCFrFQSCkaxCDExEbFTi1EbQyooGihRVxIfItWCj5QjK7iI0ZFNJrgZzFnzN1xZvbOzt2ZRfPDwt475/zn/+c+9t5NJGaQHUADcBe4DTTErScnAOuAcabxBVgfty5tAEXAAPBLDJyWD9I3ABTFrdMXQDVwRURPAjuApDzrAn7KsxQwP269rgCWAc9F6Dug3SWmBXgtMS+BFXFo9QSwCfgmAkeAWp/YGmBIYieA7ii1eomaAxxTFvQRoEQjr1jWio1TwNwoNLuJqQNuiZDvwOYcODYAX4XjPrAkH1r9BKwG3oqAJ0BjCK6lwEPhGgM6TGr1KpqUnWhKCl8E5hngrQDOOrboWSY0exU7l69iLi/pkomX5CzSCDyVAh+AtUYLZNZSp+0LYLkp4o3KgrwHLDZC7F+zDripbCRbwpA5t8iTUW6RwGzgqFJfa2t3ktQC14Qg1h8tMn9s7wALdRNXUWDHCKzjzzPR5Hr8cSYU7MEOqAIui7aMA6kaVAYMkomsR22sLXMr8EDIg2JScrs0zRQ58geBMjXghjz4bEdoEh/OQbwXDmnWtGFrva4+TGFtrfW6RoB2CZ0AtgGlOkIcHKXAduCHcPnP/Uwj9aL5qm+gBuGwhO4MasCFa5dwjWjEaunTCgTWSNh7ZI4CF/Rn0R+cl9xyrBND1lExbSSljgbQmoMJGy3C0SNt31ExZgRok5AxoFz67MNkb9YC0zx7JeeMtCuEE6AtCiP2NbVH2ouwTqwTwIIARmqwzlFTyIUK2C3cQ3k1AjTL409ApfQdlL7juiYUvhOSe0DaFcBH6Ws1agTowDqqqNijFLb386YcjDQpL8aepr2OWqMot8YwRkYdxOPKaHRLXyqoCYXf3ji6pV0pxjLMmDDimQg8xhwehdET9qr6JmR+vri0plan0YLuGjodNY1MrQ6Hmao86Vc1VKsmMLHYvfqBEmA/1iUsDfQT4CqaLV9Xhwkj6n3exr4ARnzzozSSlq5mYKV8Twcw4psf1IiJP9jU66bWhcxwvjsCjEi/y9ToC1DHNz/KqVUiYtLAK6CP4IvdMz8yI/lGHGukIFAcJtn0CCWTyWT2KHfMjIiKMG8ykTAzsv/MiPz1JqPcmcLAOQvcRiTrn2QFgOG4Bczgv8Fv4qt/96jn1/8AAAAASUVORK5CYII="><a href="../usuario/garagem.php">Garagem</a></li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;"  src="data:image/png;base64,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"><a href="../usuario/alterardados.php">Minha Conta</a>
                    <ul>
                        <li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAEcklEQVRoge2ZT2gdVRTGz01ek5i01oDBWhC1ILWGpFAqFP9AoZTqykUXVdCuRGlLXXRjF9mICInYlRUpCELpwggGTAoVDUqof6sIRbS1YKChtrQ2bawt1jTJz8V8w7svyZs3c2fei0I/eJw3c8859/vmzrlz547Zbfy34PImAJrM7Akz2ya72szuNbMmM7tsZifM7AMzG3LOzeXtry4AtgA/kg6fACuXmvMCALuBOZGcAAaAbcAaoANo0/9dwAX5/QMMA+uXmr+ZmQHPSsQc0Ae01fBfr5G7JUF/A880im81Uu3AJRHamzH2buBdxV4D7qsXzzRkXhCR74CgyQL4SDneKppfFhKHRWJfjhyblOPXIrllJXFCJLbmyFHyaqylCF5NATHtsuOhnTrnZsxs2qLnWCFTcoiQWdnEmSpDnls585hZmJAZ2eWhnQJdFo3sn865qdA8PkKExLdUnqnzYdkzOXJUIETIz7IbcvT7mOzJHDkqECLkJ9k8Qp6WHc2RowIhQuLaeDTkgQjcY2aP67CQQg+CnugALwXGNwOvKcdQUbxCRmSVbNBt4ZybNbNPddgVkmMxhAg5Jftkjn67Zc/myJEPeg8BOAvsD4jvA84px/P14JiWSJtXJ6czxjYDU4odA5bVi2daQiuAm8As0JkhbqM3moUsFmOE1Ig55/4yszHFZ7k9dsoOO+emQ/ouHMB2Xd0JoD2F/2rgupbuvY3gmApAE/C9xHwMNCf4dgLH5fthI3mmArCOaCMBYFWC3wb5XNaTvXAE1UgM59wpM5vUYSnBFdkJ59zFPH1WQy4hQqssCT7xmuquAvqrD1TAcZ2sXaR9LTAin0zTdcMA9IhcjGngINCl30Gdw/PrC+yrBXgDOE+0czkAtNaOrJ14I/CbyL0PHAJmdDzlPcFngHeArZp6bwKZ1mlAqzeqPgbyCNgEDFLe/jwOLFdbN3DV6+gq0O3F9uv8NWBHBhFHFXedSpzPSn4ZsAP4epGr8ornt3+R9le99t3z2t4D7kwp4g+gl2jRGeNcWgGdCvx93lU+AOzT8TSwGXiK8q3lY0ZtmynXyxGiWwyifeQ9zFtALiZC53spj8zrtQQ4YC8w6RE6CbwMdHh+/V5HV/T/ANHO+w/Amzp3RT4A/Yp9BPjKy38GWJNCRJxnhKSFJ9HK9pjXwZdUKU6iZcqw5ztEtB36i34lnYsxQvSFy79g24HTElIqSkQH8I2cLxLVReIGg4R/q98KxcR4bn57lRwloo9CvohLCSKSp13gbTmPA/cnOlfP8bknZCxDXJKI+HtMKhEPEc3z00BPoIgHKH+OQ/8fbJgIBcWFeyhEhHK8yEIkbhsVKkKB8TNiSw4hh1mIIwn+LURrtFhEjycirolj1PhGOT/p5AIK9UOH+hz0ROQbCQW3NlAEwB1Er75zwA0qRyJMxFIB2CnCR3W8jvL3+Gy301KCcj19QVTsN2Jh/4uRiEF5t9HHYKiIpPfsemPcolftUTP7zMxGnXMXlpDPbRSKfwHwLQG0GvziJwAAAABJRU5ErkJggg=="><a href="../usuario/alterardados.php"><a href="../usuario/alterardados.php">Meus Dados</a></li>
                        <li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAD8klEQVRoge3aW4hVZRTA8eMtRy1voYFQDxk92FBZ2eSlF4N6CCLoQlFoIXSBqKeeerGQHHWKQiJ6KQwqurwliURQGgVmkCgRUmnBJKaElImW+ethr83Zbvc5c2b2RYRZL+fstb51+Z9vr/0t9kyrNS7jcuEIdqpfdmZzTjxfsBXIivNdQGlJtySru5B35CypDQRz8BJ+wT84iCHMritn5YJZ2NehSfdhZsn459xatUj88vA9bsEMLI1r2FgyfmMg6W4sz+lXpLtSMn5jIMcj14ycfkboj4/gvwO7Mb+DvbGn1sH4vD6nXxyfB0bw72u1Wje2Wq3POsE0ItiU6ZFlsRPLeu0RzMfeWLs3D9PkrTWz7FOrG0xjIJFsduzMAZzCz9iIWbl1vc5luysBwVS8jD+6JDuBn/ARVmN6D3EbB9ncY8KsDOPRMebL31rzSoNgCf6T3CLLu6ybhqvxBHZlgN7E1BIQ5ZsdEzNFDY7CbwIewl/h+0mvMPimE0TYxwTyWPj9Kg44bC24jd7o4H8dDo8GBl8b5YE4UsBLcTT87gvd3QUQcEOXOP2jhRmhrlGDvBI+n8b1dMk4Dk/h4fi+q4P/FvRXDTMWkOHsr40X4/pbTNJ+dK4p8O3HmSi+CCYrw1iHSXWB/BY+t0km11OSp9cArgnbMbnhMHzfyhTaCwysrwtkQ0GyzWF7Na5fK/BbENCn8UUepmD9nbHm97pALsJ6HJI0/VDopmmf8NcW+K0P2wfok/RECnNTwfrlYT9SC0iXQKsj1lcFtoszkAOh68O2DrdTVtY2BiJp8vTUfaTA/kzYduT0UzGo/QDJylG8oK5m7xBkVaaA/CQ7WTLtwl2lEnWvoRxI7Mb+DMgVOfsDof8Bdb5qKg2S3Q14L2f/OPSbS1fbvY6xg+R243n8Gd+fzKxZKTkET2BhZZWfW0spkHQ39kcv3B/XJ7Eks25L6LdXVvm5tXQHkZwRG7RP9CJZFWsvDwiSBp8b+nnag+aD5wtksAsAyfumybH27dD9G59bRYNjTegOqeFdby8g6TN+6QiBFktmrpO4FUfC77mwTwhoeL1ijlGBLOuyZia+jHWbQndHgJ3GytAt0h4yu/4wdYCkM1IvMow5Gd+1oT+MBaFbF7o9mNIkSDokFo0RqZzC51iU852I7bFmJ6ZIhssfQ/dsYyAVJJirPaIMhe72uP4bV1aUp16QSHJz7NoZ3BO6dyP3topy1A8SiZ6OXMdwFS7THu3vrSB+MyCR7P3I9130yuNp41cQu1GQSyRTMMnhuTDdpQpiNwcSCfu1/3qVyjsZe6n/kGgMJIodkLwCPY4PnX32lAHZ0S3vuIxLRfI/cubRcjP6g04AAAAASUVORK5CYII="><a href="../../_php/usuario/sair.php"><a href="../../_php/usuario/sair.php">Sair</a></li>
                    </ul>
                </li>
			</ul>
		</nav>
</div>

    <div id="barrasepara">
    </div>


<form action="../../_php/usuario/alterando.php" method="POST" autocomplete="off">
    <div class="divprincipal">
        <img class="fotouser" src="<?php echo $avatarr; ?>" alt="">
        <h2 style="text-align: center;">Para trocar a sua foto de perfil, acesse pelo app.</h2>
        <div class="box2">
            
                <ul class="itens">
                    <li class="item">
                        <h2>Nome: </h2>
                        <input class="inputs" type="text" name="newnome" placeholder="
                        <?php
                            echo "*" . $nome_cadr;    
                        ?>" required>
                    </li>
                    <li class="item">
                        <h2>Email:</h2>
                        <input class="inputs" type="email" value="
                        <?php
                            echo $email_cadr;    
                        ?>"readonly>
                    </li>
                    <li class="item">
                        <h2>Data Nascimento:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                               echo $data_nascimentor;
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>CPF:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $cpf_cadr;    
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>Endereço:</h2>
                        <input type="text" class="inputs" name="newendereco" placeholder="
                        <?php
                            echo '*' . $endereco_cadr;    
                        ?>" required> 
                    </li>
                    <li class="item">
                        <h2>Senha:</h2>
                        <input type="password" class="inputs" name="newsenha" placeholder="Digite a nova senha aqui, e passe o código de validação">

                    </li>
                </ul>
                <div id="barrameio">
                </div>
                <ul class="itens2">
                    <li class="item">
                        <h2>Telefone:</h2>
                        <input type="text" class="inputs" name="newtelefone" placeholder="
                        <?php
                            echo '*' . $telefone_cadr; 
                        ?>" required> 
                    </li>
                    <li class="item">
                        <h2>Site:</h2>
                        <input type="text" class="inputs" name="newsite" placeholder="
                        <?php
                            echo '*' . $site;    
                        ?>" >
                    </li>
                    <li class="item">
                        <h2>Anúncio em destaque:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $adDestaquer;    
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>Membro desde:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $membrodesder;    
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>Prime:</h2>
                        <input type="text" class="inputs" value="
                        <?php
                            echo $adDestaquer;    
                        ?>" readonly>
                    </li>
                    <li class="item">
                        <h2>Código para alterar a senha:</h2>
                        <input type="text " class="inputs" name="codigo"> 
                    </li>
                    <button type="submit" id="alterarbt" name="enviado">Alterar</button>
                </ul>
        </div>
    </div>
</form>