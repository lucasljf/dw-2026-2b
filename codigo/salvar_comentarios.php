<?php
require_once "../conexao.php";

$idcurso = $_GET['idusuario'];
$idpostagem = $_GET['idpostagem'];
$texto = $_GET['texto'];

$sql = "INSERT INTO turma (idusuario, idpostagem, texto) VALUES ($idpostagem, $idpostagem, '$texto')";

mysqli_query($conexao, $sql);

header("Location: ../sucesso.html");

?>