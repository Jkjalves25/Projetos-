<?php
require_once("dba/config.php"); // o arquivo de configuração precisa ser requerido no início do código

$id = $_GET["id"] ?? ""; // a variável $id é definida com o valor do parâmetro "id" da URL ou com uma string vazia caso esse parâmetro não esteja presente

if (!empty($id)) { // verifica se a variável $id não está vazia
    $sqlSelect = "SELECT * FROM cadastro WHERE id=$id"; // remove as aspas simples ao redor da variável $id
    $result = $mysqli->query($sqlSelect);

    if ($result->num_rows > 0) {
        // caso haja resultados, armazena as informações do usuário em variáveis
        $user_data = $result->fetch_assoc();
        $situacao = $user_data["situacao"];
        $matricula = $user_data["matricula"];
        $alvara = $user_data["alvara"];
        $nome = $user_data["nome"];
        $cpf = $user_data["cpf"];
        $rg = $user_data["rg"];
        $data_nasc = $user_data["data_nasc"];
        $filiacao_pai = $user_data["filiacao_pai"];
        $filiacao_mae = $user_data["filiacao_mae"];
        $cep = $user_data["cep"];
        $endereco = $user_data["endereco"];
        $numero = $user_data["numero"];
        $bairro = $user_data["bairro"];
        $cidade = $user_data["cidade"];
        $estado = $user_data["estado"];
        $nome_templo = $user_data["nome_templo"];
        $data_inaug = $user_data["data_inaug"];
        $filiacao_religiosa = $user_data["filiacao_religiosa"];
        $data_filiacao = $user_data["data_filiacao"];
    } else {
        // faça algo caso não haja resultados (por exemplo, redirecionar para outra página)
    }
}


//require_once("viacep.php");
?>


    




<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Página de cadastro</title>
</head>
<link rel="stylesheet" href="style.css">
<script>

'use strict';

const limparFormulario = (endereco) =>{
    document.getElementById('endereco').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('cidade').value = '';
    document.getElementById('estado').value = '';
}


const preencherFormulario = (endereco) =>{
    document.getElementById('endereco').value = endereco.logradouro;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('cidade').value = endereco.localidade;
    document.getElementById('estado').value = endereco.uf;
}


const eNumero = (numero) => /^[0-9]+$/.test(numero);

const cepValido = (cep) => cep.length == 8 && eNumero(cep); 

const pesquisarCep = async() => {
    limparFormulario();
    
    const cep = document.getElementById('cep').value;
    const url = `https://viacep.com.br/ws/${cep}/json/`;
    if (cepValido(cep)){
        const dados = await fetch(url);
        const endereco = await dados.json();
        if (endereco.hasOwnProperty('erro')){
            document.getElementById('endereco').value = 'CEP não encontrado!';
        }else {
            preencherFormulario(endereco);
        }
    }else{
        document.getElementById('endereco').value = 'CEP incorreto!';
    }
     
}

document.getElementById('cep')
        .addEventListener('onfocus',pesquisarCep);



        function mascara_cpf(){

var cpf = document.getElementById("cpf")
if(cpf.value.length == 3 || cpf.value.length == 7 ){
    cpf.value +="."
}
else if(cpf.value.length == 11 ){
    cpf.value +="-"
}
}


//function mascara_cep(){

//var cep = document.getElementById("cep")
//if(cep.value.length == 5 ){
 //   cep.value +="-"
//}

//}
</script>



<body>

<div class="menu">
<ul>
  <li><a href="http://localhost/aruanda/pg_inicial/edite/pg_inicial.php">Página Inicial</a></li>
  <li><a href="http://localhost/aruanda/cadastro_bd_Aru/aruanda_21.php">Criar Cadastro</a></li>
  <li><a href="#contact">Perfil</a></li>
  <li style="float:right"><a class="active" href="http://localhost/aruanda/aruanda_login/login.php">Sair</a></li>
</ul>

</div>
<div class="form-container">
<br>


<div class="dados_pessoais">
<form action="salvaedicao.php" method="POST">

    <h2>Dados Pessoais</h2><hr>
<label>Situação cadastral</label><br><select class="text-cobalt-blue" name="situacao">
      <option value="Ativo" selected>Ativo </option>
      <option value="Inativo">Inativo </option>
</select>
</input>
<br>
<label for="'matricula">Matricula</label>
<input value="<?php echo $matricula ?>"type="number" name="matricula" id="matricula">
<label for="'alvara">Alvara</label>
<input type="text" name="alvara" id="alvara">
<label for="nome">Nome Completo</label>
<input  value="<?php echo $nome ?>"type="text" name="nome" id="nome">
<br><label for="cpf">CPF</label>
<input  value="<?php echo $cpf ?>"type="text" name="cpf" id="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="14" onkeyup="mascara_cpf()">
<label for="rg" >RG</label>
<input  value="<?php echo $rg ?>" type="number" name="rg" id="rg">
<label for="data_nasc">Data de nascimento</label><input value="<?php echo $data_nasc ?>" type="date" name="data_nasc" id="data_nasc">
<br><label for="filiacao_pai">Filiação pai</label><input type="text"value="<?php echo $filiacao_pai ?>" name="filiacao_pai" id="filiacao_pai">
<br><label for="filiacao_mae">Filiação mãe</label><input type="text" value="<?php echo $filiacao_mae ?>" name="filiacao_mae" id="filiacao_mae">
</div>


<div class="dados_endereco">
<h2>Informações de Endereço</h2>
<br><label for="cep">CEP</label><input value="<?php echo $cep ?>" placeholder="00000000" type="text" name="cep" id="cep" onkeyup="mascara_cep()">
<br>


<label for="endereco">Endereço</label><input value="<?php echo $endereco ?>"type="text" name="endereco" id="endereco" onfocus="pesquisarCep()">
<label for="numero">Numero</label><input type="number"value="<?php echo $numero ?>" name="numero" id="numero">
<label for="bairro">Bairro</label><input type="text" name="bairro"  value="<?php echo $bairro ?>"id="bairro" >
<label for="cidade">Cidade</label><input type="text" name="cidade" value="<?php echo $cidade ?>" id="cidade">
<label for="estado">Estado</label><input type="text" name="estado" id="estado" value="<?php echo $estado ?>">

</div>


<div class="dados_religioso">
    <br>
<h2>Dados Religiosos</h2>
    <label for="nome_templo">Nome templo religioso</label><br>
    <input type="text" value="<?php echo $nome_templo ?>"name="nome_templo" id="nome_templo">
    <br>
    <label for="data_inaug" value="">Data inauguração</label><input type="date"value="<?php echo $data_inaug ?>"name="data_inaug" id="data_inaug">
    <br>
    <label for="filiacao_religiosa">Filiação Religiosa</label><input type="text"value="<?php echo $filiacao_religiosa ?>" name="filiacao_religiosa" id="filiacao_religiosa">
    <br>
    <label for="data_filiacao">Data Filiação</label><input type="date"value="<?php echo $data_filiacao ?>"name="data_filiacao" id="data_filiacao">
</div>

<br>
<input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="submit" name="update" id="update">


</form>
</div>
</body>



</html>