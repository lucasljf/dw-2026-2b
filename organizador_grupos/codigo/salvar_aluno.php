<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$turma = $_POST['turma'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "foto_alunos/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql = "INSERT INTO tb_aluno (nome, idturma, foto) VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "sis", $nome, $turma, $novo_nome);
mysqli_stmt_execute($comando);

header("Location: index.php");
