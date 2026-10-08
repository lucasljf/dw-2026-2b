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
    
