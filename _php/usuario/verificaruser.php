<?php
    session_start();
    if(!isset($_SESSION['id_user'])) { 
        echo "<script>window.alert('Para fazer lances ou editar seus dados, é necessário estar logado.')</script>";
    } else {
       $id = $_SESSION['id_user'];
       $emailUser = $_SESSION['emailUser'];
       $senhaUser = $_SESSION['senhaUser'];
    }
    
?>