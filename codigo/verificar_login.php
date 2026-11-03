<?php
    require_once "conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from usuario WHERE email = ? AND senha = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "ss", $email, $senha);
    mysqli_stmt_execute($comando);

    $resultado = mysqli_stmt_get_result($comando);  
    $quantidade = mysqli_num_rows($resultado);
    
    if ($quantidade == 1) {

        $linha = mysqli_fetch_array($resultado);

        $nome = $linha['nome'];
        $email = $linha['email'];
        $idusuario = $linha['idusuario'];
        // $foto = $linha['foto'];
        
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['idusuario'] = $idusuario;
        
        header("Location: principal.php");
    }
    else {
        header("Location: index.php?erro=login&email=$email");
    }
?>
