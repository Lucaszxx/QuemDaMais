<?php
include ('../usuario/indexlogado.php');
include ('../../_php/vendor/autoload.php');
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'https://api-quem-da-mais.herokuapp.com', ]);

$veiculo_id = $_GET['veiculo_id'];
$leilao_id = $_GET['leilao_id'];
$response = $client->request('GET', '/veiculos/veiculo/' . $veiculo_id);
$dados = json_decode($response->getBody());
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../_css/veiculos/anuncio.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>
<body>
<div id="barracor">
<a href="./indexlogado.php"><img id="logo" src="../_img/logoquemdamais.png" alt=""></a>
</div>

<div id="barrasepara">
    </div>
<!--
<div class="divmenu">
<nav class="menu">
			<ul>
				<li><img style="position: absolute; margin-top:3px; width:35px; margin-left: -35px;" <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAE0UlEQVR4nO3bW6xcUxzH8TXq2tYtLlHxUJdEpInrg2pIqWoIQsQRl0Rckop4qFAqIdLgwQMP9aRKBJGIhIhLgoZIL5Q0LlFBEJcQUhqte9vjfDysdZx9jtOZOTN7Zu+j6/syk5m91v+/fvPf//Vfa+0JIZPJZDKZTCazM9Ko0jjWhhDmVOlDE9Y0Go3TWl1UtYCqtN+KRqPRUp9d++FIK9pxtJ9M5IfdpZeO7AxkAbskC9gltRMQa7G6yferTZwd9tcttRMwhDAUQih7dq71bN8xw+FRtR9jmYhfdYzASUXtBGyVA+tG7QQMvcmB/09yDszUT8CcA7sn58B2yTkwUz8Bcw7snpwD2yXnwEz9BMw5sHtyDmyXnAMzWcBuyQJ2SS2eTKhjHmyXqiNwTcX2mzFpSqlJTWkP9WBqCOGMEMKCEMK8EMLhIYRtIYQvQwivhxCWNxqNz8uy978Ax+AmvIo/WzwdMIRncWLVflcG9saFeBBfjRFoEOuwFCdjGvbHHCzHHwUhX8TsqsfTF3AEFmEl/hoj2o94Ggsxo0U/ByVxNxfar8H5/RpL30kRVWS7+HDP7TgJE86hOBD3YEuh31U4qxdjqBSsx7d4BAPYr8S+98Od2FQQch3O6+SH2WlJefU2bCwI+S4uQtV16uQBe6Rc+m1ByA24ElOq9m/SgD1xA74pCPlhSiE5ItsFu6fo+7wg5Ec5IidIEvI6o+vODTi7pP73wlV4SSyxfsVrOLeM/mtDEnJhQcgh3NFFf0fhvlQFbDc+d5c5hlqA3XAztiURF0yg7RRcgFdS22Gew+k4FDNwi5FFQ70iUUmnblicBvhKG9ceIhb/xYnpdzyMk3bQ5tZ03Wvd+loq4kpmVXrfsZg4IA3wpybXzMVT2FoQ7hPcqMWiIEUj/NKJf32hGzHFJSF8N+bzfcQyaENBtO14BvO1ucop9L+p2XWVbumP+Tvpv+fB4t9gh1r83fSa9LoytTk2hHB9COGKEMLe6bvvQwgrQggPNRqN7/7TQ3OuTq9vTrBd9YyJzMV4R9x3nIWjxTX0YIqQQbxXiLYhvC4W3rt1aH+hOElt1+ttNzQwG/fji5RjFmP/kvp/3Pj8jReMlCCb8QCO6dDOLrgUz6e+t+HKMsYwnrGiaF/vYIC/YwWO69LWrmLp8QTex6d4FHPS9yfgckzrwsY54gbGMB/jzG78Hs9IM9G+Tp/Pxrl42eg6axUu0eEt1StwCt4o+PkNrkV5c4OYd5YavSYdNrYMpxpnZhMr/XuN3u/7Pn12WGkOdoB4lvN04UfehCXYq2xDbzWJtHbLgem43uiyYiue1OdzEczEY2KOI65778I+vTK4Rlx7Tki0Jv3NE+uxwYKY68XF/J5l+T2O3YPT3TJcUG8VJ5yDe2Wzp4jrzaVG70L/nAY5s0Q709OtOXz+8ne6dY8sy0aliLvQAynSFQa5Eud3GvFGdm5+KPS7EseXPYbaIJ7yFc+PiSXLEm0eZom13IBYjw7zJub22v/akPLVEqNLpV+SuLOatJuPDwptNmCgn77XCrGAHjC6ThsSa8yLsK94NHox3i5c8xkuk89PRhDXv8vwmx2zMUXuHlX7W1vEZ20WiZPOFnH9u1bcvppatX+ZTCaTyWQymUwm0x/+Aa/9sMyIIr0SAAAAAElFTkSuQmCC"><a href="#">Anunciar</a>
                    <ul>
                        <li><a href="./anuncio.php">Cadastrar veiculo</a></li>
                        <li><a href="#">Meus anuncios</a></li>
                    </ul>
                </li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAADe0lEQVRoge2YP2wcRRjF35yR7ci2AKVI4STCwgYBDQUWf6xEKAVQIpAVJCRAFCDiJtRQkpiU1ElFESk4jhVhU2BFMTYNoomtdBHEQtiyMDb+QySs2P5R7Le6yd3e3s3drpNin3Ta3Zn53nvfzTe7sysVKFCgQIECzcO1Egy0SXpZ0pCkAUnH7dch6UkbFh//8Y47kv6w3x1JP0v6xTm334qfYADPAN8Ay2SHFeAiMNiMp6AZAQ5JuiBpRFLJmu9K+knSLUmLdv2vpG1Ju5I2bNwTkh6T1COpW1KfpKckvSjpdTuPcVnSZ865reCMGkjCAdft39sFrgAnM+Q/AXwL3DeNWaBUPzJc6EMTWAdey1ygrPMSsGZa7+Uh8KuRf5Q5ebXWiGnNZE08aMR/AZ2ZkifrPQ7cM83nGolptAY/seMl59x/zdlrHM65TUnf2eXHmZACh4ANYB94OhPSxnSHbEZWgY4sCD8wwhsZ+AvVvm3aw1mQ3TSy9zPwFqp91rSnQ4LeAmaA7YSn7g7QnaPnWp4Om3Ylts3rm5UB7wJ7CQExJg86Cc/bDym+9oB3pPJd60s7/0rSEeeck9QuadX6Fw88gzLueh7azNsRRV5LirxH8Mqpz2t728t8AzgD9ANdeTsHukzrjGnHeMMb0xeXmR84kzJ9v6X0HRTSPMz4iQwAU1Qv9F2gl2gNTQC/U37i5ol7pjVh2r3mxcc2MAn0p03t5zZ4KqfqCQblRX82JGjegoaBduACyS9RW8A4MNCCwaPAmHFVYgkYNQ/D1jYfQh6jA/i6Xh0Qbbt7m0jiWcpb9jScNy8ABCdi50t2WfUOQlS7k9Z/pYlErlns90l/BOX91lKlr2YSiUvq+Rpjj1n/RlJ/HZ24nBJnE3ih0UQa2cZfteMccDrUbB3Epqq+HZjWbIWHQPYHZ6QHmPbqdQ44BXQSLdQpax9rQmfcYieNq9O45zy9H7F9XkulZdcl4FOiTzZJWCPtfl5bZwD4uwbnimmWvPGtJeK1dwNfAAtED61NoltncBIeZy/RF5lN41wwjarddmaJPGyk+Upd7MAr+VgKB/BqWn/il8ZHcTZ82Fb+AdS7/a7n5KUZhHupt0byWkOt6NaakWULHEogi9uWQo02gGx1iXac9XAuG+856hJtm0cpbxh9/AmcA9pzSOSh6BYoUKBAgQL/A+WK1ss0UXvoAAAAAElFTkSuQmCC"><a href="#">Categorias</a>
					<ul>
						<li><a href="#">Sedã</a></li>
						<li><a href="#">Hatch</a></li>
						<li><a href="#">SUV</a></li>
						<li><a href="#">Picape</a></li>
					</ul>
				</li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" <img src="data:image/png;base64,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"><a href="./cadastro.html">Cadastre-se</a></li>
				<li><img style="position: absolute; margin-top:5px; width:30px; margin-left: -35px;" <img src="data:image/png;base64,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"><a href="./loging.html">Login</a></li>
			</ul>
		</nav>
</div>
-->
<div class="anuncioVeiculo">
  <div class="fotoAnuncio">
    <!--Carrosel -->
    <div class="owl-carousel owl-theme">
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dados->path_imagem ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dados->path_imagem2 ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dados->path_imagem3 ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dados->path_imagem4 ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dados->path_imagem5 ?>" alt="">
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    <!--Carrosel -->  
  </div>
  <div class="informacoesAnuncio">
    <ul class="dadosAnuncio">
      <div class="informacoesCarro">
      <div class="boxInformacoes">
            <li class="dadoAnuncio">
              <h2 class="info">Modelo:</h2>
              <?php echo $dados->fabricante . " " . $dados->modelo?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Ano:</h2>
              <?php echo $dados->ano ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Câmbio:</h2>
              <?php echo $dados->cambio ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Combustivel:</h2>
              <?php echo $dados->combustivel ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Carroceria:</h2>
              <?php echo $dados->carroceria ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Condição:</h2>
              <?php echo $dados->condicao ?>
            </li>
          </div>
          
          <div class="boxInformacoes2">
            <li class="dadoAnuncio">
              <h2 class="info">Renavam:</h2>
                <?php echo $dados->renavam ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Cor:</h2>
              <?php echo $dados->cor ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Status Do Veiculo:</h2>
              <?php echo $dados->status_veiculo?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Informações Adicionais:</h2>
              <?php echo $dados->informacoes_adicionais;?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Id Do Veiculo:</h2>
              <?php echo $dados->veiculo_id;?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Id Do Dono:</h2>
              <?php echo $dados->vendedor_id;?>
            </li>
          </div>
          <div class="boxInformacoes3">
            <li class="dadoAnuncioDesc">
              <h2 class="infoDesc">Informações Adicionais:</h2>
              <?php echo $dados->informacoes_adicionais;?>
            </li>
          </div>
  </div>

          <!-- Requisição do leilão-->
          <?php
$response = $client->request('GET', 'leiloes/leilao/' . $leilao_id);
$dados = json_decode($response->getBody());
// Variaveis
$data_final = $dados->data_final;
$lance_inicial = $dados->lance_inicial;
$lance_final = $dados->lance_final;
$lance_inicial_formatado = number_format($lance_inicial, 2, ',', '.');
$lance_final_formatado = number_format($lance_final, 2, ',', '.');
if (empty($lance_final))
{
    $lance_final = 0;
}

?>
          <!-- Requisição do leilão-->

      </div>
      <div class="informacoesCarro2">
        <h2 class="carroNome2">Lances</h2>
          <div class="boxInformacoesLeilao">
            <li class="dadoAnuncio">
              <h2 class="info">Valor atual:</h2>
              R$: <?php echo $lance_final_formatado ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Valor inicial:</h2>
              R$: <?php echo $lance_inicial_formatado ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Expira em:</h2>
              <?php echo str_replace('-', '/', $data_final) ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Dar um lance:</h2>
              <form action="../../_php/leilao/alterarLeilao.php" method="post">
              <input type="text" name="valor">
              <button type="submit">Dar lance</button>
              </form>
            </li>
      </div>
      
    </ul>
  </div>
</div>

  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin:10,
        dots: false,
      });
    })
  </script>
</body>
</html>
