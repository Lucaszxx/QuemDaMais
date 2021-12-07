<?php
include ('../usuario/indexlogado.php');
include ('../../_php/vendor/autoload.php');
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'https://api-quem-da-mais.herokuapp.com', 
'verify' => false]);

$veiculo_id = $_GET['veiculo_id'];
$leilao_id = $_GET['leilao_id'];
$responseVeiculo = $client->request('GET', '/veiculos/veiculo/' . $veiculo_id);
$dadosVeiculo = json_decode($responseVeiculo->getBody());
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

<div class="anuncioVeiculo">
  <div class="fotoAnuncio">
    <!--Carrosel -->
    <div class="owl-carousel owl-theme">
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dadosVeiculo->path_imagem ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dadosVeiculo->path_imagem2 ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dadosVeiculo->path_imagem3 ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dadosVeiculo->path_imagem4 ?>" alt="">
      </div>
      <div class="item">
        <img class="imgVeiculo" src="<?php echo $dadosVeiculo->path_imagem5 ?>" alt="">
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
              <?php echo $dadosVeiculo->fabricante . " " . $dadosVeiculo->modelo?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Ano:</h2>
              <?php echo $dadosVeiculo->ano ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Câmbio:</h2>
              <?php echo $dadosVeiculo->cambio ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Combustivel:</h2>
              <?php echo $dadosVeiculo->combustivel ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Carroceria:</h2>
              <?php echo $dadosVeiculo->carroceria ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Condição:</h2>
              <?php echo $dadosVeiculo->condicao ?>
            </li>
          </div>
          
          <div class="boxInformacoes2">
            <li class="dadoAnuncio">
              <h2 class="info">Renavam:</h2>
                <?php echo $dadosVeiculo->renavam ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Cor:</h2>
              <?php echo $dadosVeiculo->cor ?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Status Do Veiculo:</h2>
              <?php echo $dadosVeiculo->status_veiculo?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Id Do Veiculo:</h2>
              <?php echo $dadosVeiculo->veiculo_id;?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Id Do Dono:</h2>
              <?php echo $dadosVeiculo->vendedor_id;?>
            </li>
          </div>
          <div class="boxInformacoes3">
            <li class="dadoAnuncioDesc">
              <h2 class="infoDesc">Informações Adicionais:</h2>
              <?php echo $dadosVeiculo->informacoes_adicionais;?>
            </li>

                    <!-- Requisição Vendedor -->
                    <?php 
                      $responseVendedor = $client->request('GET', 'leiloes/leilao/' . $leilao_id);
                      $dadosVendedor = json_decode($responseVendedor->getBody());
                      //Variaveis
                      $nomeVendedor = $dadosVendedor->nome;
                      $telefoneVendedor = $dadosVendedor->telefone;
                      $enderecoVendedor = $dadosVendedor->;
                    ?>


            <div class="boxInformacoesVendedor">  
            <li class="dadoAnuncio">
              <h2 class="info">Vendedor:</h2>
              <?php echo $nomeVendedor?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Telefone:</h2>
              <?php echo $telefoneVendedor?>
            </li>
            <li class="dadoAnuncio">
              <h2 class="info">Endereço:</h2>
              <?php echo $enderecoVendedor?>
            </li>
            </div>
          </div>
  </div>

  
          <!-- Requisição do leilão-->
          <?php
$responseLeilao = $client->request('GET', 'leiloes/leilao/' . $leilao_id);
$dadosLeilao = json_decode($responseLeilao->getBody());
// Variaveis
$data_final = $dadosLeilao->data_final;
$lance_inicial = $dadosLeilao->lance_inicial;
$lance_final = $dadosLeilao->lance_final;
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
