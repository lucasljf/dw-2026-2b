<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de trabalhos</title>
</head>
<body>
    <form action="salvar_trabalho.php">
        Nome do trabalho: <br>
        <input type="text" name="nome"> <br><br>

        Valor: <br>
        <input type="text" name="valor"> <br><br>

        Descrição: <br>
        <textarea name="descricao"></textarea> <br><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>