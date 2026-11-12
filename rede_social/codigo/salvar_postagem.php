<?php
    session_start();
    
    require_once "conexao.php";

    $idusuario = $_SESSION['idusuario'];
    $texto = $_POST['texto'];

    $sql = "INSERT INTO postagem (texto, idusuario) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "si", $texto, $idusuario);
    mysqli_stmt_execute($comando);

    header("Location: principal.php");
?>
