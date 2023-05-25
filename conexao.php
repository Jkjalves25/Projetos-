<?php

//Inicio da conexão com o banco de dados utilizando PDO
$host = "localhost";
$userName = "root";
$pass = "@Jkjalves25";
$dbname = "formulario-aruanda";


try {
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $mysqli = $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $userName, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexão com o banco de dados utilizando PDO
