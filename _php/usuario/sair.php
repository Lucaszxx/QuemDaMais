<?php
    $tipo = $_GET['type'];

    session_start();
    session_unset();
    session_destroy();

    if($tipo == 'sleep') {
        header('location: ../../_html/usuario/loging.html');
    } else
    {
        echo "<script>window.alert('Caso queira anunciar ou dar algum lance, você precisa estar logado.')</script>";
        header( "refresh:0.1;url=../../_html/index.php");
    }