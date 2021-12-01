<?php
include('../_php/vendor/autoload.php');
use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
]);

  $id_veiculo = $_POST['id_veiculo'];

  $response = $client->request('GET', '/veiculos/veiculo/65');
  $dados = json_decode($dados->getBody());
  $fabricante = $dados->fabricante;
  $modelo = $dados->modelo;
  $ano = $dados->ano;
  $cambio = $dados->cambio;
  $combustivel = $dados->combustivel;
  $carroceria = $dados->carroceria;
  $condicao = $dados->condicao;

?>