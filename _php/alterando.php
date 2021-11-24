<?php
    include('../_html/alterardados.php');
    require('./vendor/autoload.php');
    use GuzzleHttp\Client;

try
{
    // Recebendo dados do form
    $newnome = $_POST['newnome'];
    $newendereco = $_POST['newendereco'];
    $newtelefone = $_POST['newtelefone'];
    $newsite = $_POST['newsite'];

    $client = new GuzzleHttp\Client([
        'base_uri' => 'https://api-quem-da-mais.herokuapp.com/usuarios/usuarios', [
            'headers' => [
                'Content-type' => 'application/json',
                'Authorization' => 'Sei lá',
            ],
            'body' => json_encode([
                'nome' => 'Lucas',
            ])
        ]
    ]);

    //$response = $client->PATCH('')
    //$body = $response->getBody();
    //$arr_body = json_decode($body);
    //print_r($arr_body);
    
}

catch(Expection $e)
{
    echo "Algo deu errado";
}

