<?php
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

$quantidade = mysqli_num_rows($resultado);

if ($quantidade == 1) {
    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $email = $linha['email'];
    $idusuario = $linha['idusuario'];
    
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $nome;
    $_SESSION['idusuario'] = $idusuario;
    
    header("Location: principal.php");
    exit;
} else {

    header("Location: index.php?erro=login&email=$email");
    exit;
}
?>