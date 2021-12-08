<?php
    require('../../_php/vendor/autoload.php');
    require('../../_html/usuario/indexlogado.php');
    use GuzzleHttp\Client;
    $client = new Client([
        'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
        'verify' => false
    ]);

    $categoria = $_GET['categoria_veiculo'];
    $response = $client->request('GET', '/leiloes/categoria/' . $categoria);
    $dados = json_decode($response->getBody());
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../_css/usuario/indexlogado.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!--Link de fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=PT+Sans+Narrow&family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <title>Bem vindo</title>
</head>

<body>
<div id="barracor">
<a href="./indexlogado.php"><img id="logo" src="../../_img/logoquemdamais.png" alt=""></a>
</div>
    

    <div id="barrasepara">
    </div>


    
    <div class="anuncios">
        <div class='box'>
        <?php
            for($cont = 0; $cont < count($dados); $cont++){
                ?>
                    <div class="divFoto">
                        <img class="fotocarro" src="<?php echo $dados[$cont]->imagem_principal ?>" alt="">
                        <ul>
                            <li class="teste">Fabricante: <?php echo $dados[$cont]->fabricante;?></li>
                            <li class="teste">Modelo: <?php echo $dados[$cont]->modelo;?></li>
                            <li class="teste">Ano: <?php echo $dados[$cont]->ano;?></li>
                            <li class="teste">Condição: <?php echo $dados[$cont]->condicao;?></li>
                            <li class="teste">Câmbio: <?php echo $dados[$cont]->cambio;?></li>
                            <button class="btInfo"><a target="_blank" href="../veiculos/anuncio.php?veiculo_id=<?php echo $dados[$cont]->veiculo_id;?>&leilao_id=<?php echo $dados[$cont]->leilao_id;?>">Mais informações</a></button>

                        </ul>
                    </div>
                <?php
            }
        ?>
        </div>
    </div>

    
</body>

</html>