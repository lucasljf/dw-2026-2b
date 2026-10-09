<?php
require_once "conexao.php";
require_once "grupo_2verifica_sesao.php";

$idusuario  = $_SESSION['idusuario'];

// Troque $_GET por $_POST para bater com o method="post" do HTML
$idpostagem = $_POST['idpostagem'];
$texto = $_POST['comentario'];

if (!empty($texto) && $idpostagem > 0) {
    $sql = "INSERT INTO comentario (idusuario, idpostagem, texto) VALUES ($idusuario, $idpostagem, '$texto')";
    mysqli_query($conexao, $sql);
}

header("Location: listar_postagem.php");
?>