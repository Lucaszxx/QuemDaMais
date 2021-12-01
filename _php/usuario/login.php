<?php
ob_start();
session_start();
// Chamando o arquivo do GUZZLE
require '../vendor/autoload.php';
include_once ('../../_html/usuario/loging.html');
// Definindo o método GUZZLE para poder fazer qualquer tipo de requisição
use GuzzleHttp\Client;
$client = new Client(['base_uri' => 'https://api-quem-da-mais.herokuapp.com', ]);
try
{
    $email = $_POST['email_cad'];
    $senha = $_POST['senha_cad'];
    $verify = $_POST['codverify'];

    $response = $client->request('GET', // Tipo de requisião
    '/usuarios/usuario/' . $email . '/' . $senha // URI da Api
    );
    $dados = json_decode($response->getBody());
    if (gettype($dados) == 'integer' and isset($verify) == 'true')
    {
        $response = $client->request('PATCH', '/usuarios/usuario/validation/' . $email . '/' . $verify);
        echo "<script>window.alert('Validado com sucesso!')</script>";
        header('refresh: 0.1; url=../../_html/usuario/loging.html');
    }
    elseif (gettype($dados) == 'integer' and empty($verify))
    {
        echo "<script>window.alert('Digite o seu código de validação')</script>";
        header('refresh: 0.1; url=../../_html/usuario/loging.html');
    }
    elseif (gettype($dados) == 'object')
    {
         // Verificando se o usuario validou a conta
         $_SESSION['id_user'] = $dados->id;
         $_SESSION['emailUser'] = $dados->email;
         $_SESSION['senhaUser'] = $dados->senha;
         header('refresh: 0.1; url=../../_html/usuario/indexlogado.php');
    }
}
catch(Exception $e)
{
    echo "<script>window.alert('Conta não validada ou Usuário/Senha incorretos...')</script>";
}
ob_end_flush();
?>