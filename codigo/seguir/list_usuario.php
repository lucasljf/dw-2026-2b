<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_grupo6.css">
</head>
<body>

    <span><h2>Lista de Usuarios</h2></span>

    <table>
        <tr>
            <td>id do usuário</td>
            <td>username</td>
            <td>seguir</td>
        </tr>

        <?php 

        require_once "../conexao.php";

        // Pega o ID de quem está logado
        $id_logado = $_SESSION['idusuario'];
        
        // Busca todos os usuários, menos você, para você não aparecer na sua própria lista.
        $sql = "SELECT * FROM usuario WHERE idusuario != $id_logado";
        $resultados = mysqli_query($conexao, $sql);
        
        // Quebra a variável $resultados em linhas (vetores/array)
        while ($linha = mysqli_fetch_array($resultados)) {
            $idusuario = $linha['idusuario'];
            $username = $linha['username'];

            // Busca no banco linha onde quem está a seguir(idseguidor) é você($id_logado), e confere se a pessoa que está a ser seguida (idseguindo) é o usuário atual da linha
            $conferir = mysqli_query($conexao, "SELECT * FROM seguir WHERE idseguidor = $id_logado AND idseguindo = $idusuario");
            $ja_segue = mysqli_num_rows($conferir) > 0;     
            echo "<tr>";
            echo "<td>$idusuario</td>";
            echo "<td>$username</td>";
   
            // Coloca o link de seguir/deixar de seguir chamando o seu script  
            if ($ja_segue) { // Se for verdadeiro (já segue)
                echo "<td class='nao-seguir'><a class='link' href='seguir.php?id=$idusuario'>Deixar de seguir</a></td>";
            } else { // Se for falso (ainda não segue)
                echo "<td class='seguir'><a class='link' href='seguir.php?id=$idusuario'>Seguir</a></td>";
            }

            echo "</tr>";
        }
        ?>
  
    </table>
</body>
</html>