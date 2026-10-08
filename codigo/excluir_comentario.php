<?php
    require_once "conexao.php";

   session_start();

// Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login.php");
        exit();
    }  

    // pega o id do usuario logado
    $usuario = $_SESSION['usuario_id'];
    
    //pegao id do comentario
    $comentario_id = $_GET['idcomentario']; ?? null;
    
    if (!$idcomentario) {
        header("location: listar_comentarios.php");
        exit();
    }
    
    //excluir somente se o comentario pertencer ao usuario logado
    $sql = "DELETE FROM comentarios WHERE idcomentario = ? AND usuario_id = ?";
    $stmt = mysqli_prepare(conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $comentario_id, $usuario);

    //volta para a lista de comentarios
    header ("location: listar_comentarios.php");
    exit;

    ?>