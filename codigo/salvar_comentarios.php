<?php
require_once "conexao.php";
require_once "grupo_2verifica_sesao.php";

$idusuario = $_SESSION['idusuario'];
$idpostagem = $_GET['idpostagem'];
$texto = $_GET['comentario'];

$sql = "INSERT INTO comentario (idusuario, idpostagem, texto) VALUES ($idusuario, $idpostagem, '$texto')";

mysqli_query($conexao, $sql);

header("Location: listar_postagem.php");

?>