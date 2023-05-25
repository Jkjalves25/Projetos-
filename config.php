<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "@Jkjalves25";
$dbName = "formulario-aruanda";

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//if($conexao->connect_error){

 ///echo "Erro";}
//else {
//echo "Conexão efetuada com sucesso";
//}



?>