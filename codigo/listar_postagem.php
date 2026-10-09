<?php
require_once "grupo_2verifica_sesao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feed</title>
    <style>
        div {
            border-style: solid;
        }

        .postagens {
            border-color: blue;
            padding: 10px;
        }

        .postagem {
            border-color: red;
            padding: 10px;
            margin: 10px;
        }

        /* Estilização do Accordion nativo */
        details.accordion-item {
            border: 1px solid #ccc;
            margin-top: 10px;
            padding: 5px;
            border-radius: 4px;
        }

        summary.accordion-header {
            cursor: pointer;
            font-weight: bold;
            padding: 5px;
            user-select: none;
        }

        .accordion-body {
            padding: 10px;
            border-top: 1px solid #eee;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <h2>Lista de postagem</h2>

    <div class="postagens">
        <?php
        require_once "conexao.php";

        $sql = "SELECT postagem.idpostagem, postagem.texto, postagem.data_hora, postagem.idusuario, usuario.username, usuario.nome, usuario.foto
            FROM postagem, usuario
            WHERE postagem.idusuario = usuario.idusuario;";

        $postagens = mysqli_query($conexao, $sql);

        while ($postagem = mysqli_fetch_array($postagens)) {
            $idpostagem   = $postagem['idpostagem'];
            $texto        = $postagem['texto'];
            $data_hora    = $postagem['data_hora'];
            $idusuario    = $postagem['idusuario'];
            $nome_usuario = $postagem['nome'];
            $username     = $postagem['username'];
            $foto_usuario = $postagem['foto'];

            echo "<div class='postagem'>";
            echo "<img src='fotos_usuario/$foto_usuario' width='40'>";
            echo " <strong>$nome_usuario</strong> ($username)";
            echo "<br>ID Post: " . $idpostagem;
            echo "<br>" . $texto;
            echo "<br><small>" . $data_hora . "</small>";

            // Consulta a quantidade de comentários
            $sql2 = "SELECT comentario.idcomentario, comentario.idusuario, comentario.texto, usuario.username, usuario.nome, usuario.foto
                FROM comentario, usuario
                WHERE idpostagem = $idpostagem
                AND comentario.idusuario = usuario.idusuario ORDER BY comentario.idcomentario;";
            $comentarios = mysqli_query($conexao, $sql2);
            $quantidade_comentario = mysqli_num_rows($comentarios);
            ?>

            <!-- Accordion Nativo para Comentários -->
            <details class="accordion-item" name="accordionComentarios">
                <summary class="accordion-header">
                    Comentários (<?php echo $quantidade_comentario; ?>)
                </summary>

                <div class="accordion-body">
                    <?php
                    if ($quantidade_comentario == 0) {
                        echo "<p>Seja o primeiro a comentar...</p>";
                    } else {
                        while ($comentario = mysqli_fetch_array($comentarios)) {
                            $idcomentario                 = $comentario['idcomentario'];
                            $comentario_texto            = $comentario['texto'];
                            $comentario_nome_usuario     = $comentario['nome'];
                            $comentario_username_usuario = $comentario['username'];
                            $comentario_foto_usuario     = $comentario['foto'];

                            echo "<div style='margin-bottom: 8px;'>";
                            echo "<img src='fotos_usuario/$comentario_foto_usuario' width='25'> ";
                            echo "<strong>$comentario_nome_usuario</strong> ($comentario_username_usuario): ";
                            echo $comentario_texto;
                            echo "</div>";
                        }
                    }
                    ?>

                    <!-- Formulário para envio de comentário -->
                    <form action="salvar_comentarios.php" method="post" style="margin-top: 10px;">
                        <input type="hidden" name="idpostagem" value="<?php echo $idpostagem; ?>">
                        <input type="text" name="comentario" placeholder="Escreva um comentário..." required>
                        <input type="submit" value="Comentar">
                    </form>
                </div>
            </details>

        <?php
            echo "</div>"; // Fecha div.postagem
        }
        ?>
    </div>
</body>

</html>