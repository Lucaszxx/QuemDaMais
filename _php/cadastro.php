<?php
    include('../_html/cadastro.html');
    include('./vendor/autoload.php');
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
    $avatar = $_FILES['avatar_usuario']['name'];
    echo $avatar;

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
            'senha' => $senha
        ]
    ]);

    
    if ($response->getStatusCode() == 200) {
        try
        {
        $response = $client->post('https://api-quem-da-mais.herokuapp.com', [
            'form_fields' => [
                'field_name' => 'avatar_usuario',
            ],
            'form_files' => [
                [
                    'name'     => $avatar,
                    'contents' => fopen($avatar, 'r')
                ],
            ]
        ]);
        }
        catch (Expection $e) 
        {
            echo "Algo deu errado " . $e;
        }
    }
    else
    {
        echo '<script>window.alert("A imagem não foi inserida")</script>';
    }
    //$body = $response->getBody(); 
    //$arr_body = json_decode($body);
    //print_r($arr_body);


    
}
catch (Exception $e){
    echo "Algo deu errado";
}

?>