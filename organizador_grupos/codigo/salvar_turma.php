<?php
require_once "conexao.php";

$nome = $_GET['nome'];

$sql = "INSERT INTO tb_turma (nome) VALUES (?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "s", $nome);
mysqli_stmt_execute($comando);

header("Location: index.php");
