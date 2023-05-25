<?php
if(isset($_POST["submit"]))
{
    require_once("config.php");

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
			
    $result = mysqli_query($conexao, "INSERT INTO cadastro(situacao,matricula,alvara,nome,cpf,rg,data_nasc,filiacao_pai,filiacao_mae,cep,endereco,numero,bairro,cidade,estado,nome_templo,data_inaug,filiacao_religiosa,data_filiacao) 
VALUES ('$situacao','$matricula','$alvara','$nome','$cpf','$rg','$data_nasc','$filiacao_pai','$filiacao_mae','$cep','$endereco','$numero','$bairro','$cidade','$estado','$nome_templo','$data_inaug','$filiacao_religiosa','$data_filiacao')");
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
//retorno api
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
    }//else{
       // document.getElementById('endereco').value = 'CEP incorreto!';
    //}
     
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

function duplicidade(){
    if(cpf.value = cpf.value){

        
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
<form action="aruanda_21.php" method="POST">

    <h2>Dados Pessoais</h2><hr>
<label>Situação cadastral</label><br><select class="text-cobalt-blue" name="situacao">
      <option value="Ativo" selected>Ativo </option>
      <option value="Inativo">Inativo </option>
      <option value="Falecido">Falecido </option>
</select>
</input>
<br>
<label for="'matricula">Matricula</label>
<input type="number" name="matricula" id="matricula">
<label for="'alvara">alvara</label>
<input type="text" name="alvara" id="alvara">
<label for="nome">Nome Completo</label>
<input type="text" name="nome" id="nome">
<br><label for="cpf">CPF</label>
<input type="text" name="cpf" id="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="14" onkeyup="mascara_cpf()">
<label for="rg">RG</label>
<input type="number" name="rg" id="rg">
<label for="data_nasc">Data de nascimento</label><input type="date" name="data_nasc" id="data_nasc">
<br><label for="filiacao_pai">Filiação pai</label><input type="text" name="filiacao_pai" id="filiacao_pai">
<br><label for="filiacao_mae">Filiação mãe</label><input type="text" name="filiacao_mae" id="filiacao_mae">
</div>


<div class="dados_endereco">
<h2>Informações de Endereço</h2>
<br><label for="cep">CEP</label><input placeholder="00000000" type="text" name="cep" id="cep" onkeyup="mascara_cep()">
<br>


<label for="endereco">Endereço</label><input type="text" name="endereco" id="endereco" onfocus="pesquisarCep()">
<label for="numero">Numero</label><input type="number" name="numero" id="numero">
<label for="bairro">Bairro</label><input type="text" name="bairro" id="bairro" >
<label for="cidade">Cidade</label><input type="text" name="cidade" id="cidade">
<label for="estado">Estado</label><input type="text" name="estado" id="estado">

</div>


<div class="dados_religioso">
    <br>
<h2>Dados Religiosos</h2>
    <label for="nome_templo">Nome templo religioso</label><br>
    <input type="text" name="nome_templo" id="nome_templo">
    <br>
    <label for="data_inaug">Data inauguração</label><input type="date" name="data_inaug" id="data_inaug">
    <br>
    <label for="filiacao_religiosa">Filiação Religiosa</label><input type="text" name="filiacao_religiosa" id="filiacao_religiosa">
    <br>
    <label for="data_filiacao">Data Filiação</label><input type="date" name="data_filiacao" id="data_filiacao">
</div>
<br>
  <input type="submit" name="submit" id="submit">


</form>
</div>
</body>



</html>
