<?php
    include('../_html/alterardados.php');
    require('./vendor/autoload.php');
    use GuzzleHttp\Client;
    $client = new Client([
        'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
    ]);

    // Verificando código
    $codEnviado = $_POST['codigo'];
    if ($codEnviado != $codigo){
        echo "<script>window.alert('Código de validação incorreto')</script>";
        die();
        exit();
        header('refresh: 1; url=../_html/indexlogado.php');
    }

try
{
    // Recebendo dados do form
    $newnome = $_POST['newnome'];
    $newendereco = $_POST['newendereco'];
    $newtelefone = $_POST['newtelefone'];
    $newsite = $_POST['newsite'];
    $newsenha = $_POST['newsenha'];

    $response = $client->request('PATCH', '/usuarios/usuario',[
        'json' => [
            'nome' => $newnome,
            'telefone' => $newtelefone,
            'endereco' => $newendereco,
            'link' => $newsite,
            'senha' => $newsenha,
            'cpf_cnpj' => $cpf_cadr,
        ]
    ]);
    header('refresh: 0.1; url=./_php/sair.php');
}
catch (ClientException $e) {
    echo $response->getStatusCode();
}
