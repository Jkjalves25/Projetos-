<?php

session_start(); // Iniciar a sessao

// Limpar o buffer de saida
ob_start();

// Incluir a conexao com BD
include_once "conexao.php";

// Receber o id do registro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


?>
<?php
if(isset($_POST["submit"])) {
    require_once("dba/config.php");

    $data_pg = $_POST["data_pg"] ?? '';
    $valor_pg = $_POST["valor_pg"] ?? '';

    if (!empty($data_pg)) {
        $result = mysqli_query($conexao, "INSERT INTO pagamento (data_pg, valor_pg) 
        VALUES ('$data_pg', '$valor_pg')");}}

       // if($result) {
          // echo "Payment inserted successfully.";
      // } //else {
          //  echo "Error inserting payment: " . mysqli_error($conexao);
       // }
   // } else {
      //  echo "Error: Data de pagamento is required.";
   // }
//}


$id = $_GET["id"] ?? ""; // a variável $id é definida com o valor do parâmetro "id" da URL ou com uma string vazia caso esse parâmetro não esteja presente

if (!empty($id)) { // verifica se a variável $id não está vazia
    $sqlSelect = "SELECT * FROM cadastro WHERE id=$id"; // remove as aspas simples ao redor da variável $id
    $result = $mysqli->query($sqlSelect);

    if ($result->num_rows > 0) {
        // caso haja resultados, armazena as informações do usuário em variáveis
        $user_data = $result->fetch_assoc();
        $situacao = $user_data["situacao"] ;
        $matricula = $user_data["matricula"];}}
?>



<!DOCTYPE html>
<html lang="pt-br">
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylevisu.css">

    <title>Página de cadastro</title>
</head>
<link rel="stylesheet" href="stylevisu.css">
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

function duplicidade(){
    if(cpf.value = cpf.value){


    }

}

var valor = "vr_pg";
	var valorFormatado = valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	alert('O valor formatado de ' + valor + ' é ' + valorFormatado);





//function mascara_cep(){

//var cep = document.getElementById("cep")
//if(cep.value.length == 5 ){
 //   cep.value +="-"
//}

//}
</script>


<body>

 
<body>

<div class="menu">
<ul>
  <li><a href="http://localhost/aruanda/pg_inicial/edite/pg_inicial.php">Página Inicial</a></li>
  <li><a href="http://localhost/aruanda/cadastro_bd_Aru/aruanda_21.php">Criar Cadastro</a></li>
  <li><a href="#contact">Perfil</a></li>
  <li style="float:right"><a class="active" href="#about">Sair</a></li>
</ul>
<br>
<br>
<br>
</div>
<br>
<br>
<br>




<div class="info">

<?php


  // Acessa o IF quando a variavel $id he diferente de vazio
  if (!empty($id)) {
    // Query recuperar os dados do usuario
    $query_usuario = "SELECT id, situacao, matricula, nome, cpf, rg, filiacao_pai, filiacao_mae, cep, endereco, bairro, numero, cidade, estado FROM cadastro WHERE id=:id LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id);
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
      $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
      extract($row_usuario);


    
    }}


    
 
        ?>


</div>
<div class="visu">
<label for="nome">Nome Completo</label><input type="text" id="nome" value="<?php echo $nome?>" readonly>
<label for="situação">Situação</label><input type="text" id="situacao" value="<?php echo $situacao?>" readonly>
<label for="matricula">Matricula</label><input type="text" id="matricula"value="<?php echo $matricula?>" readonly>
<br>
<br>
<label for="cpf">CPF</label><input type="text" id="cpf"value="<?php echo $cpf?>" readonly>
<label for="rg">RG</label><input type="text" id="rg" value="<?php echo $rg?>" readonly>
<label for="filiacao_pai">Filiação Pai</label><input type="text" id="filiacao_pai" value="<?php echo $filiacao_pai?>" readonly><br>
<label for="filiacao_mae">Filiação Mãe</label><input type="text" id="filiacao_mae"value="<?php echo $filiacao_mae?>" readonly>
<br><br>
<label for="endereco">Endereço</label><input value="<?php echo $endereco ?>"type="text" name="endereco" id="endereco" readonly>
<label for="numero">Numero</label><input type="number"value="<?php echo $numero ?>" name="numero" id="numero" readonly>
<label for="bairro">Bairro</label><input type="text" name="bairro"  value="<?php echo $bairro ?>"id="bairro" readonly>
<label for="cidade">Cidade</label><input type="text" name="cidade" value="<?php echo $cidade ?>" id="cidade"readonly>
<label for="estado">Estado</label><input type="text" name="estado" id="estado" value="<?php echo $estado ?>"readonly>





</div>
<br>
<br>




</form>
</div>
</body>





</html>

