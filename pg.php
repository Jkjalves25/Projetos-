<?php
if(isset($_POST["submit"])) {
    require_once("dba/config.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="pg.php" method="POST">
        <div class="pg">
            <label for="data_pg">Data de pagamento</label>
            <input type="date" id="data_pg" name="data_pg"><br>

            <label for="valor_pg">Valor pagamento</label>
            <input type="number" id="valor_pg" name="valor_pg">

            <input type="submit" name="submit" id="submit">
        </div>
    </form>
</body>
</html>