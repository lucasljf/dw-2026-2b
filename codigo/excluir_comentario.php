<?php
    require_once "conexao.php";
    require_once "grupo_2verifica_sesao.php";
    $idcomentario = $_GET['idcomentario'];
    $idusuario = $_SESSION['idusuario'];
    $idpostagem = $_GET['idpostagem'];

    $sql = "delete from comentario where idcomentario = $idcomentario AND idusuario = $idusuario AND idpostagem = $idpostagem";

    mysqli_query($conexao, $sql);

    header("Location: listar_postagem.php");
