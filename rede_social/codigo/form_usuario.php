<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salvar_usuario.php" method="post" enctype="multipart/form-data">
        Nome de usuário: <br>
        <input type="text" name="username"><br>
        
        Nome: <br>
        <input type="text" name="nome"><br>

        E-mail: <br>
        <input type="text" name="email"><br>

        Senha: <br>
        <input type="text" name="senha"><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="Criar conta">
    </form>
</body>
</html>
