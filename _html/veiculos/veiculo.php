<?php

include ('../../_php/vendor/autoload.php');
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'https://api-quem-da-mais.herokuapp.com', 
'verify' => false]);

$veiculo_id = $_GET['veiculo_id'];
$response = $client->request('GET', '/veiculos/veiculo/' . $veiculo_id);
$dadosVeiculo = json_decode($response->getBody());
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../_css/veiculos/veiculo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>
<body>
<div id="barracor">
  <a href="../usuario/indexlogado.php"><img id="logo" src="../../_img/logoquemdamais.png" alt=""></a>
</div>

<div id="barrasepara">
    </div>

<div class="anuncioVeiculo">
  <div class="fotoAnuncio">
    <!--Carrosel -->
    <div class="owl-carousel owl-theme">
    <div class="item">
        <?php 
          $foto1 = $dadosVeiculo->path_imagem;
          if (isset($foto1)){
            ?>
                <img class="imgVeiculo" src="<?php echo $foto1 ?>" alt="">
            <?php 
          } else {
            ?>
              <div class="item">
                <img class="imgVeiculo" src="../../_img/carro.jpg" alt="">
              </div>
            <?php
          }
        ?>
      </div>
      <div class="item">
        <?php 
          $foto2 = $dadosVeiculo->path_imagem2;
          if (isset($foto2)){
            ?>
              <img class="imgVeiculo" src="<?php echo $foto2 ?>" alt="">
            <?php 
          } else {
            ?>
              <img class="imgVeiculo" src="../../_img/carro.jpg" alt="">
            <?php
          }
        ?>
      </div>
      <div class="item">
        <?php 
          $foto3 = $dadosVeiculo->path_imagem3;
          if (isset($foto3)){
            ?>
                <img class="imgVeiculo" src="<?php echo $foto3 ?>" alt="">
            <?php 
          } else {
            ?>
              <div class="item">
                <img class="imgVeiculo" src="../../_img/carro.jpg" alt="">
              </div>
            <?php
          }
        ?>
      </div>
      <div class="item">
        <?php 
          $foto4 = $dadosVeiculo->path_imagem4;
          if (isset($foto4)){
            ?>
              <img class="imgVeiculo" src="<?php echo $foto4 ?>" alt="">
            <?php 
          } else {
            ?>
              <img class="imgVeiculo" src="../../_img/carro.jpg" alt="">
            <?php
          }
        ?>
      </div>
      <div class="item">
        <?php 
          $foto5 = $dadosVeiculo->path_imagem5;
          if (isset($foto5)){
            ?>
              <img class="imgVeiculo" src="<?php echo $foto5 ?>" alt="">
            <?php 
          } else {
            ?>
              <img class="imgVeiculo" src="../../_img/carro.jpg" alt="">
            <?php
          }
        ?>
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
              <h2 class="info">C??mbio:</h2>
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
              <h2 class="info">Condi????o:</h2>
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
              <h2 class="info">Informa????es Adicionais:</h2>
              <?php echo $dadosVeiculo->informacoes_adicionais;?>
            </li>
          </div>

          <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin:10,
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
      });
    })
  </script>
  </body>
  </html>