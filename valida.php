
<?php
session_start();
include_once("config_log.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

// Assuming you have already established a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pprepara a query para receber as informações 
$sql = "SELECT * FROM acesso WHERE email = ? AND senha = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("ss", $email, $senha);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if (mysqli_num_rows($result) < 1) {
    unset($_SESSION['email']);
unset($_SESSION['senha']);
    echo  "<script>alert('Email ou senha inválida');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
} else {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    echo  "<script>alert('Seja bem vindo');</script>";
    echo "<script>window.location.href = 'pg_inicial.php';</script>";
}



?>
