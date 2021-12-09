<?php
ini_set('display_errors', 0 );
error_reporting(0);
include('../usuario/garagem.php');
require ('../../_php/usuario/verificaruser.php');
include('../../_php/vendor/autoload.php');

use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
    'verify' => false
]);

$response = $client->request('GET', 'leiloes/criados/' . $id);
$dados = json_decode($response->getBody());
?>

    <div class="anuncios">
        <div class='box'>
        <?php
            for($cont = 0; $cont < count($dados); $cont++){
                $data_final = $dados[$cont]->data_final;
                $lance_inicial = $dados[$cont]->lance_inicial;
                $lance_final = $dados[$cont]->lance_final;
                $lance_inicial_formatado = number_format($lance_inicial, 2, ',', '.');
                $lance_final_formatado = number_format($lance_final, 2, ',', '.');
                ?>
                    <div class="divFoto">
                        <img class="fotocarro" src="<?php echo $fotoVeiculo ?>" alt="">
                        <ul>
                            <li >Leilão Id: <?php echo $dados[$cont]->leilao_id;?></li>
                            <li >Data Final: <?php echo str_replace('-', '/', $data_final)?></li>
                            <li >Lance Inicial R$: <?php echo $lance_final_formatado;?></li>
                            <li >Ultimo Lance R$: <?php echo $lance_inicial_formatado;?></li>
                            <li >Id ultimo a dar lance: <?php echo $dados[$cont]->comprador_id;?></li>
                            <li >Participantes: <?php echo $dados[$cont]->participantes;?></li>
                            <li >Status: <?php echo $dados[$cont]->status_leilao;?></li>
                            <li >Destaque: <?php echo $dados[$cont]->status_destaque;?></li>
                            <button class="btInfo"><a target="_blank" href="./anuncio.php?veiculo_id=<?php echo $dados[$cont]->veiculo_id;?>&leilao_id=<?php echo $dados[$cont]->leilao_id; ?>">Ver Leilão</a></button>
                        </ul>
                    </div>
                <?php
            }
        ?>
        </div>
    </div>
</body>
</html>

