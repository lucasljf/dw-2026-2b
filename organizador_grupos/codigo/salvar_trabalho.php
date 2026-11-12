<?php
require_once "conexao.php";

$nome = $_GET['nome'];
$valor = $_GET['valor'];
$descricao = $_GET['descricao'];

$sql = "INSERT INTO tb_trabalho (nome, valor, descricao) VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "sds", $nome, $valor, $descricao);
mysqli_stmt_execute($comando);

header("Location: index.php");
