<?php
    // Chamando o arquivo do GUZZLE


    require './vendor/autoload.php';
    include_once ('../_html/loging.html');
    session_start();
try 
{
    $email = $_POST['email_cad'];
    $senha = $_POST['senha_cad'];

    // Definindo o método GUZZLE para poder fazer qualquer tipo de requisição
    $client = new GuzzleHttp\Client();

    $resposta = $client->request(
        'GET', // Tipo de requisião
        'https://api-quem-da-mais.herokuapp.com/usuarios/usuario/' . $email . '/' . $senha // URI da Api
    );
    
    //echo 'Resposta API : ' . $resposta->getStatusCode();

    $dados = json_decode($resposta->getBody());
    $_SESSION['id_user'] = $dados->id;
    $_SESSION['emailUser'] = $dados->email;
    $_SESSION['senhaUser'] = $dados->senha;

    header('location: ../_html/indexlogado.php');
}

catch (Exception $e) {
    echo "<script>window.alert('Usuário ou senha incorretos...')</script>";
}

?>
