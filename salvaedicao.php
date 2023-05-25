<?php
require_once("dba/config.php");



if(isset($_POST["update"])){

    $id = $_POST["id"];
    $situacao = $_POST["situacao"];
    $matricula = $_POST["matricula"];
    $alvara = $_POST["alvara"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $data_nasc = $_POST["data_nasc"];
    $filiacao_pai = $_POST["filiacao_pai"];
    $filiacao_mae = $_POST["filiacao_mae"];
    $cep = $_POST["cep"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $nome_templo = $_POST["nome_templo"];
    $data_inaug = $_POST["data_inaug"];
    $filiacao_religiosa = $_POST["filiacao_religiosa"];
    $data_filiacao = $_POST["data_filiacao"];
			
    $sqlUpdate = "UPDATE cadastro SET situacao= '$situacao', matricula ='$matricula', alvara='$alvara', nome='$nome',
cpf='$cpf', rg='$rg', data_nasc='$data_nasc', filiacao_pai='$filiacao_pai', filiacao_mae='$filiacao_mae',cep='$cep', endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', nome_templo='$nome_templo', data_inaug='$data_inaug', filiacao_religiosa='$filiacao_religiosa', data_filiacao='$data_filiacao'
WHERE id = '$id'";

$result = $mysqli->query($sqlUpdate);}

header('Location: pg_inicial.php');


?>