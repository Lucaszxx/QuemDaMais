<?php
    include('../../_html/usuario/cadastro.html');
    include('../vendor/autoload.php');
    use GuzzleHttp\Client;
   
try
{   
    $cpf_cad = $_POST['cpf_cad'];
    $nome_cad = $_POST['nome_cad'];
    $telefone = $_POST['telefone_cad'];
    $email_cad = $_POST['email_cad'];
    $data_nasc = $_POST['data_nasc'];
    $endereco = $_POST['endereco_cad'];
    $link = $_POST['site_cad'];
    $senha = $_POST['senha_cad'];
    $client = new Client([
        'base_uri' => 'https://api-quem-da-mais.herokuapp.com',
    ]);

    $response = $client->request('POST', '/usuarios/usuario', [
        'json' => [
            'cpf_cnpj' => $cpf_cad,
            'nome' => $nome_cad,
            'telefone' => $telefone,
            'email' => $email_cad,
            'data_nasc' => $data_nasc,
            'endereco' => $endereco,
            'link' => $link,
            'senha' => $senha,
        ]
    ]);

}
catch (Exception $e){
    echo "Algo deu errado";
}

?>