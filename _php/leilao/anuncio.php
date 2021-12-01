<?php
 include('../_php/verificaruser.php');
 include('../_html/cadastro.html');
 include('./vendor/autoload.php');
 use GuzzleHttp\Client;

 $client = new Client([
 'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
]);




?>