<?php
class BancoDeDados
{
    private $host = 'localhost';
    private $db = 'projeto';
    private $usuario = 'root';
    private $senha = '';

    private $conexao = "mysql:host=$host;dbname=$db;charset=UTF8";

        try
        {
            $pdo = new PDO($conexao, $usuario, $senha);
            if ($pdo)
            {
                //echo "Banco conectado com sucesso.";
                
            }
        }
        catch(PDOException $e)
        {
            //echo "ERRO: Banco não conectado";
            
        }
}


?>
