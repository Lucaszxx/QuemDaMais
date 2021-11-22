<?php
    session_start();
    if(!isset($_SESSION['id_user'])) { 
        header ('location: ./sair.php');
    } else {
       $id = $_SESSION['id_user'];
    }
    
?>