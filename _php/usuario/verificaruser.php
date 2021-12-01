<?php
    session_start();
    if(!isset($_SESSION['id_user'])) { 
        echo "<script>window.alert('Por favor, faça login')</script>";
        header ('refresh: 0.1; url=../_php/sair.php');
    } else {
       $id = $_SESSION['id_user'];
       $emailUser = $_SESSION['emailUser'];
       $senhaUser = $_SESSION['senhaUser'];
    }
    
?>