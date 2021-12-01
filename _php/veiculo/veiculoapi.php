<?php
    include('../_php/verificaruser.php');
    include('../_html/cadastro.html');
    include('./vendor/autoload.php');
    use GuzzleHttp\Client;

    $client = new Client([
    'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
]);
try
{
    $fabricante = $_POST['fabricante'];
    $modelo =  $_POST['modelo'];
    $ano = $_POST['ano'];
    $cambio = $_POST['cambio'];
    $renavam = $_POST['renavam'];
    $carroceria = $_POST['carroceria'];
    $combustivel = $_POST['combustivel'];
    $condicao = $_POST['condicao'];
    $ainfo = $_POST['ainfo'];
    $cor = $_POST['cor'];

    $response = $client->request('POST', '/veiculos/veiculo', [
        'json' => [
            'renavam' => $renavam,
            'fabricante' => $fabricante,
            'modelo' => $modelo,
            'ano' => $ano,
            'cambio' => $cambio,
            'cor' => $cor,
            'carroceria' => $carroceria,
            'combustivel' => $combustivel,
            'condicao' => $condicao,
            'informacoes_adicionais' => $ainfo,
            'vendedor_id' => $id,
        ]
    ]);
}
catch(Expection $e){
    echo 'Deu errado';
}
?>