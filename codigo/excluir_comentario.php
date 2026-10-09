<?php
    require_once "conexao.php";

   session_start();

// Verifica se o usuário está logado
    if (!isset($_SESSION['idusuario'])) {
        header("Location: login.php");
        exit();
    }  

    // pega o id do usuario logado
    $usuario = $_SESSION['idusuario'];
    
    //pegao id do comentario
    $comentario_id = $_GET['idcomentario'];
    
    if (!$comentario_id) {
        header("location: listar_postagem.php");
    }