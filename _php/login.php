<?php

include_once ('../_html/loging.html');
session_start();

$email = $_POST['email_cad'];
$senha = $_POST['senha_cad'];


$url = "https://api-quem-da-mais.herokuapp.com/usuarios/usuarios";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($ch));


//var_dump($resultado);


foreach($resultado as $result){}

$total = count((array)$resultado);
for ($contador = 0; $contador < $total; $contador++){
    $nomeUsuario = $resultado[$contador]->nome . "<br>";
    echo $nomeUsuario;
}

if (!in_array("$email", $resultado)){
    echo "Email encontrado";
}

?>