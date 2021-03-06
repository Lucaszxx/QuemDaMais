<?php
    include ('../../_php/usuario/verificaruser.php');
    if (empty($id)){
        header('refresh: 0.1; url=../index.php');
        die;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../_css/veiculos/cadastrarveiculo.css">
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
<a href="./indexlogado.php"><img id="logo" src="../_img/logoquemdamais.png" alt=""></a>
</div>
<div class="divmenu">
<nav class="menu">
			<ul>
				<li><img style="position: absolute; margin-top:3px; width:35px; margin-left: -35px;"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAE0UlEQVR4nO3bW6xcUxzH8TXq2tYtLlHxUJdEpInrg2pIqWoIQsQRl0Rckop4qFAqIdLgwQMP9aRKBJGIhIhLgoZIL5Q0LlFBEJcQUhqte9vjfDysdZx9jtOZOTN7Zu+j6/syk5m91v+/fvPf//Vfa+0JIZPJZDKZTCazM9Ko0jjWhhDmVOlDE9Y0Go3TWl1UtYCqtN+KRqPRUp9d++FIK9pxtJ9M5IfdpZeO7AxkAbskC9gltRMQa7G6yferTZwd9tcttRMwhDAUQih7dq71bN8xw+FRtR9jmYhfdYzASUXtBGyVA+tG7QQMvcmB/09yDszUT8CcA7sn58B2yTkwUz8Bcw7snpwD2yXnwEz9BMw5sHtyDmyXnAMzWcBuyQJ2SS2eTKhjHmyXqiNwTcX2mzFpSqlJTWkP9WBqCOGMEMKCEMK8EMLhIYRtIYQvQwivhxCWNxqNz8uy978Ax+AmvIo/WzwdMIRncWLVflcG9saFeBBfjRFoEOuwFCdjGvbHHCzHHwUhX8TsqsfTF3AEFmEl/hoj2o94Ggsxo0U/ByVxNxfar8H5/RpL30kRVWS7+HDP7TgJE86hOBD3YEuh31U4qxdjqBSsx7d4BAPYr8S+98Od2FQQch3O6+SH2WlJefU2bCwI+S4uQtV16uQBe6Rc+m1ByA24ElOq9m/SgD1xA74pCPlhSiE5ItsFu6fo+7wg5Ec5IidIEvI6o+vODTi7pP73wlV4SSyxfsVrOLeM/mtDEnJhQcgh3NFFf0fhvlQFbDc+d5c5hlqA3XAztiURF0yg7RRcgFdS22Gew+k4FDNwi5FFQ70iUUmnblicBvhKG9ceIhb/xYnpdzyMk3bQ5tZ03Wvd+loq4kpmVXrfsZg4IA3wpybXzMVT2FoQ7hPcqMWiIEUj/NKJf32hGzHFJSF8N+bzfcQyaENBtO14BvO1ucop9L+p2XWVbumP+Tvpv+fB4t9gh1r83fSa9LoytTk2hHB9COGKEMLe6bvvQwgrQggPNRqN7/7TQ3OuTq9vTrBd9YyJzMV4R9x3nIWjxTX0YIqQQbxXiLYhvC4W3rt1aH+hOElt1+ttNzQwG/fji5RjFmP/kvp/3Pj8jReMlCCb8QCO6dDOLrgUz6e+t+HKMsYwnrGiaF/vYIC/YwWO69LWrmLp8QTex6d4FHPS9yfgckzrwsY54gbGMB/jzG78Hs9IM9G+Tp/Pxrl42eg6axUu0eEt1StwCt4o+PkNrkV5c4OYd5YavSYdNrYMpxpnZhMr/XuN3u/7Pn12WGkOdoB4lvN04UfehCXYq2xDbzWJtHbLgem43uiyYiue1OdzEczEY2KOI65778I+vTK4Rlx7Tki0Jv3NE+uxwYKY68XF/J5l+T2O3YPT3TJcUG8VJ5yDe2Wzp4jrzaVG70L/nAY5s0Q709OtOXz+8ne6dY8sy0aliLvQAynSFQa5Eud3GvFGdm5+KPS7EseXPYbaIJ7yFc+PiSXLEm0eZom13IBYjw7zJub22v/akPLVEqNLpV+SuLOatJuPDwptNmCgn77XCrGAHjC6ThsSa8yLsK94NHox3i5c8xkuk89PRhDXv8vwmx2zMUXuHlX7W1vEZ20WiZPOFnH9u1bcvppatX+ZTCaTyWQymUwm0x/+Aa/9sMyIIr0SAAAAAElFTkSuQmCC"><a href="#">Anunciar</a>
                    <ul>
                    <li><a href="./cadastrarveiculo.php">Cadastrar veiculo</a></li>
                        <li><a href="./anunciosUser.php">Meus anuncios</a></li>
                    </ul>
                </li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAADe0lEQVRoge2YP2wcRRjF35yR7ci2AKVI4STCwgYBDQUWf6xEKAVQIpAVJCRAFCDiJtRQkpiU1ElFESk4jhVhU2BFMTYNoomtdBHEQtiyMDb+QySs2P5R7Le6yd3e3s3drpNin3Ta3Zn53nvfzTe7sysVKFCgQIECzcO1Egy0SXpZ0pCkAUnH7dch6UkbFh//8Y47kv6w3x1JP0v6xTm334qfYADPAN8Ay2SHFeAiMNiMp6AZAQ5JuiBpRFLJmu9K+knSLUmLdv2vpG1Ju5I2bNwTkh6T1COpW1KfpKckvSjpdTuPcVnSZ865reCMGkjCAdft39sFrgAnM+Q/AXwL3DeNWaBUPzJc6EMTWAdey1ygrPMSsGZa7+Uh8KuRf5Q5ebXWiGnNZE08aMR/AZ2ZkifrPQ7cM83nGolptAY/seMl59x/zdlrHM65TUnf2eXHmZACh4ANYB94OhPSxnSHbEZWgY4sCD8wwhsZ+AvVvm3aw1mQ3TSy9zPwFqp91rSnQ4LeAmaA7YSn7g7QnaPnWp4Om3Ylts3rm5UB7wJ7CQExJg86Cc/bDym+9oB3pPJd60s7/0rSEeeck9QuadX6Fw88gzLueh7azNsRRV5LirxH8Mqpz2t728t8AzgD9ANdeTsHukzrjGnHeMMb0xeXmR84kzJ9v6X0HRTSPMz4iQwAU1Qv9F2gl2gNTQC/U37i5ol7pjVh2r3mxcc2MAn0p03t5zZ4KqfqCQblRX82JGjegoaBduACyS9RW8A4MNCCwaPAmHFVYgkYNQ/D1jYfQh6jA/i6Xh0Qbbt7m0jiWcpb9jScNy8ABCdi50t2WfUOQlS7k9Z/pYlErlns90l/BOX91lKlr2YSiUvq+Rpjj1n/RlJ/HZ24nBJnE3ih0UQa2cZfteMccDrUbB3Epqq+HZjWbIWHQPYHZ6QHmPbqdQ44BXQSLdQpax9rQmfcYieNq9O45zy9H7F9XkulZdcl4FOiTzZJWCPtfl5bZwD4uwbnimmWvPGtJeK1dwNfAAtED61NoltncBIeZy/RF5lN41wwjarddmaJPGyk+Upd7MAr+VgKB/BqWn/il8ZHcTZ82Fb+AdS7/a7n5KUZhHupt0byWkOt6NaakWULHEogi9uWQo02gGx1iXac9XAuG+856hJtm0cpbxh9/AmcA9pzSOSh6BYoUKBAgQL/A+WK1ss0UXvoAAAAAElFTkSuQmCC"><a href="#">Categorias</a>
					<ul>
						<li><a href="#">Sed??</a></li>
						<li><a href="#">Hatch</a></li>
						<li><a href="#">SUV</a></li>
						<li><a href="#">Picape</a></li>
					</ul>
				</li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -33px;"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAADgElEQVRoge2YO2gUURSGd02IYh5EEqIEgo8isQpELCTGEE1hGiGFjRaCFrFQSCkaxCDExEbFTi1EbQyooGihRVxIfItWCj5QjK7iI0ZFNJrgZzFnzN1xZvbOzt2ZRfPDwt475/zn/+c+9t5NJGaQHUADcBe4DTTErScnAOuAcabxBVgfty5tAEXAAPBLDJyWD9I3ABTFrdMXQDVwRURPAjuApDzrAn7KsxQwP269rgCWAc9F6Dug3SWmBXgtMS+BFXFo9QSwCfgmAkeAWp/YGmBIYieA7ii1eomaAxxTFvQRoEQjr1jWio1TwNwoNLuJqQNuiZDvwOYcODYAX4XjPrAkH1r9BKwG3oqAJ0BjCK6lwEPhGgM6TGr1KpqUnWhKCl8E5hngrQDOOrboWSY0exU7l69iLi/pkomX5CzSCDyVAh+AtUYLZNZSp+0LYLkp4o3KgrwHLDZC7F+zDripbCRbwpA5t8iTUW6RwGzgqFJfa2t3ktQC14Qg1h8tMn9s7wALdRNXUWDHCKzjzzPR5Hr8cSYU7MEOqAIui7aMA6kaVAYMkomsR22sLXMr8EDIg2JScrs0zRQ58geBMjXghjz4bEdoEh/OQbwXDmnWtGFrva4+TGFtrfW6RoB2CZ0AtgGlOkIcHKXAduCHcPnP/Uwj9aL5qm+gBuGwhO4MasCFa5dwjWjEaunTCgTWSNh7ZI4CF/Rn0R+cl9xyrBND1lExbSSljgbQmoMJGy3C0SNt31ExZgRok5AxoFz67MNkb9YC0zx7JeeMtCuEE6AtCiP2NbVH2ouwTqwTwIIARmqwzlFTyIUK2C3cQ3k1AjTL409ApfQdlL7juiYUvhOSe0DaFcBH6Ws1agTowDqqqNijFLb386YcjDQpL8aepr2OWqMot8YwRkYdxOPKaHRLXyqoCYXf3ji6pV0pxjLMmDDimQg8xhwehdET9qr6JmR+vri0plan0YLuGjodNY1MrQ6Hmao86Vc1VKsmMLHYvfqBEmA/1iUsDfQT4CqaLV9Xhwkj6n3exr4ARnzzozSSlq5mYKV8Twcw4psf1IiJP9jU66bWhcxwvjsCjEi/y9ToC1DHNz/KqVUiYtLAK6CP4IvdMz8yI/lGHGukIFAcJtn0CCWTyWT2KHfMjIiKMG8ykTAzsv/MiPz1JqPcmcLAOQvcRiTrn2QFgOG4Bczgv8Fv4qt/96jn1/8AAAAASUVORK5CYII="><a href="./anunciosUser.php">Garagem</a></li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;"  src="data:image/png;base64,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"><a href="./alterardados.php">Minha Conta</a>
                    <ul>
                        <li><a href="./alterardados.php">Meus Dados</a></li>
                        <li><a href="../_php/sair.php">Sair</a></li>
                    </ul>
                </li>
			</ul>
		</nav>
</div>

    <div id="barrasepara">
    </div>



    <div class="divprincipal">
        <div class="box2">
            <form action="../../_php/veiculo/veiculoapi.php" method="post" autocomplete="off">
                <div id="fotocarro"><img style="margin-left: 10px; width: 130px; border-radius: 7px;" src="../../_img/carro.jpg" alt=""></div>
                <input type="file" id="inputcarro">
                <ul class="itens">
                    <li class="item">
                        <h2>Fabricante:</h2>
                        <input class="inputs" type="text" name="fabricante">
                    </li>
                    <li class="item">
                        <h2>Modelo:</h2>
                        <input class="inputs" type="text" name="modelo">
                    </li>
                    <li class="item">
                        <h2>Ano:</h2>
                        <input type="text" class="inputs" name="ano">
                    </li>
                    <li class="item">
                        <h2>C??mbio:</h2>
                        <input type="text" class="inputs" list="transmissao" name="cambio">
                        <datalist id="transmissao">
                            <option value="Manual"></option>
                            <option value="Autom??tico"></option>
                            <option value="Sequencial"></option>
                        </datalist>
                    </li>
                    <li class="item">
                        <h2>Renavam: </h2>
                        <input type="text" class="inputs" required name="renavam">
                    </li>
                </ul>
                <div id="barrameio">
                </div>
                <ul class="itens2">
                    <li class="item">
                        <h2>Carroceria:</h2>
                        <input type="text" class="inputs" list="carroceria" name="carroceria">
                        <datalist id="carroceria">
                            <option value="Sedan"></option>
                            <option value="Hatch"></option>
                            <option value="SUV"></option>
                            <option value="Picape"></option>
                        </datalist>
                    </li>
                    <li class="item">
                        <h2>Combustivel:</h2>
                        <input type="text" class="inputs" list="combustivel" name="combustivel">
                        <datalist id="combustivel">
                            <option value="Flex"></option>
                            <option value="Gasolina"></option>
                            <option value="Etanol"></option>
                            <option value="Diesel"></option>
                            <option value="El??trico"></option>
                        </datalist>
                    </li>
                    <li class="item">
                        <h2>Condi????o:</h2>
                        <input type="text" class="inputs" list="condicao" name="condicao">
                        <datalist id="condicao">
                            <option value="Novo"></option>
                            <option value="Semi-Novo"></option>
                            <option value="Usado"></option>
                        </datalist>
                    </li>
                    <li class="item">
                        <h2>Informa????es Adicionais:</h2>
                        <input type="text" class="inputs" name="ainfo">
                    </li>
                    <li class="item">
                        <h2>Cor:</h2>
                        <input type="text" class="inputs" list="cor" name="cor">
                        <datalist id="cor">
                            <option value="Branco"></option>
                            <option value="Preto"></option>
                            <option value="Cinza"></option>
                            <option value="Azul"></option>
                            <option value="Vermelho"></option>
                            <option value="Prata"></option>
                            <option value="Outra cor? Digite no campo."></option>
                        </datalist>
                    </li>
                    <button type="submit" id="alterarbt">Anunciar</button>
                </ul>
            </form>
        </div>
    </div>