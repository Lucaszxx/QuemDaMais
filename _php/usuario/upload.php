<?php
    include('../../_html/usuario/cadastro.html');
    include('../vendor/autoload.php');
    use GuzzleHttp\Client;

    $client = new Client([
        'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
    ]);

    try
    {
        $res = $client->request('POST', $this->base_api . $endpoint, [
            'multipart' => [
                [
                    'name'     => 'avatar_usuario',
                    'contents' => file_get_contents($tmp . $avatar_usuario),
                    'filename' => $avatar_usuario
                ],
            ],
        ]);
    }
    catch(Exception $e){
        echo "Foto não subiu!";
    }



?>