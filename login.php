<?php
if(isset($_POST["submit"]))
{
    require_once("config_log/config_log.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];
   
			
    $result = mysqli_query($conexao, "INSERT INTO acesso(email,senha)
VALUES ('$email','$senha')");
}   

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <title>Document</title>
</head>
<body>

<form action="valida.php" method="POST">
    
<div class="login">

<h1>Please sign in</h1>
<br>

<input type="email" name="email" id="email" onclick="float" placeholder="Digite seu email" required>
<label id="email" name="email" type="email">Email Adresse</label>
</div>
<div class="senha">
<input type="password" name="senha" id="senha" placeholder="Digite sua senha" required><label id="">Password</label>

</div>

<div class="submit"> <input type="submit" name="submit"  id="submit "value="Sing in" class="submit" >

<script src="jsj.js">

</script>

</form>


    </body>
    </html>




