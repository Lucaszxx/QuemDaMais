<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
require('./conexao.php');
include('../_html/alterardados.php');
// Recebendo dados do form
$newnome = $_POST['newnome'];
$newendereco = $_POST['newendereco'];
$newtelefone = $_POST['newtelefone'];
$senhauser = $_POST['senha_cad'];

// Verificando a senha
$stmt = $pdo->prepare("SELECT senha_cad FROM usuarios WHERE email_cad = :email_cad");
$stmt -> bindParam(':email_cad', $email_cadr);
$stmt->execute();

$result = $stmt->fetchAll();

foreach ($result as $value) {
    $passCrypt = $value['senha_cad'];
}

if(password_verify($senhauser, $passCrypt)){
    $stmt = $pdo->prepare("UPDATE usuarios SET nome_cad = :newnome, telefone_cad = :newtelefone, endereco_cad = :newendereco WHERE email_cad = '$email_cadr'");
    $stmt -> bindParam('newnome', $newnome);
    $stmt -> bindParam('newtelefone', $newtelefone);
    $stmt -> bindParam('newendereco', $newendereco);

    $stmt->execute();

    echo "<script>window.alert('Dados alterados com sucesso')</script>";
    header( "refresh:0.1;url=../_html/indexlogado.php");
    

} else 
    echo "<script>window.alert('Ops, senha incorreta.')</script>";
?>
