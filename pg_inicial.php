<?php
session_start(); // Iniciar a sessão

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    echo "<script>alert('Email ou senha inválida');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}


$logado = $_SESSION['email'];
require_once("dba/config.php");


if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM cadastro WHERE id LIKE '%$data%' OR nome LIKE '%$data%' OR alvara LIKE'%$data%' OR matricula LIKE '%$data%' ORDER BY id DESC LIMIT 2";
} else {
    $sql = "SELECT * FROM cadastro ORDER BY id DESC";
}
// executa uma consulta SQL
$result = $mysqli->query($sql);

   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <ul>
          <li><a href="http://localhost/aruanda/pg_inicial/edite/pg_inicial.php">Página Inicial</a></li>
          <li><a href="http://localhost/aruanda/cadastro_bd_Aru/aruanda_21.php">Criar Cadastro</a></li>
          <li><a href="#contact">Perfil</a></li>
          <li style="float:right"><a class="active" href="http://localhost/aruanda/pg_inicial/edite/login.php">Sair</a></li>
        </ul>
    </div>
       
    <br>
    <br>
    <br>

    <div class="container-1">
        <label for=""></label><input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar nome">
        <button onclick="searchdata()" class="pesquisa">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>


    <div class="relatorio">

    
    <button id="btnRelatorio" type="button" class="btn btn-primary"><a href="http://localhost/aruanda/pg_inicial/edite/excel.php">
    Baixar Relatório
    </a></button>
    




    </div>
    <br>

    <div class="table">

<table class="table table-hover">
<thead>
<tr>

<th scope="col">Situação</th>
<th scope="col">Matricula</th>
<th scope="col">Alvara</th>
<th scope="col">Nome</th>
<th scope="col">CPF</th>
<th scope="col">Filiação Religiosa</th>
<th scope="col">Ações</th>
</tr>
</thead>
<tbody>
<?php
// usa o resultado da consulta
 while ($row = $result->fetch_assoc()) {
     echo "<tr>";

     echo "<td>".$row["situacao"]."</td>";
     echo "<td>".$row["matricula"]."</td>";
     echo "<td>".$row["alvara"]."</td>";
     echo "<td>".$row["nome"]."</td>";
     echo "<td>".$row["cpf"]."</td>";
     echo "<td>".$row["filiacao_religiosa"]."</td>";
     echo "<td>
    
     <a class= 'btn btn-sm btn-primary' href='visualizar.php?id=$row[id]'>
     <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-up' viewBox='0 0 16 16'>
     <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z'/>
     <path d='M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z'/>
   </svg></a>
   
     <a class= 'btn btn-sm btn-primary' href='edite.php?id=$row[id]'>
     <svg xmlns='http://www.w3.org/2000/svg'top='25'
      width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
</svg>
</a>
     


     
     </td>";}
?>
</tbody>

</table>
        </div>
</body>
<script>
var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event){

    if(event.key === "Enter"){
        searchdata();
    }
});

function searchdata() {
    window.location = 'pg_inicial.php?search=' + search.value;
}
</script>

</html>


