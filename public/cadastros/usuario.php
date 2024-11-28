<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="../css/cadastros.css">
</head>
<body>
    <div id="form-container" class="form-container">
        <form action="controller.php?cadastro=usuario" method="POST" id="user-form">
            <h2>Cadastrar Usuário</h2>
            <label for="login">Usuário:</label>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="senha" id="senha" name="senha" required>
            <br>
            <button type="submit">Cadastrar</button>
            <button type="button" id="close-form">Fechar</button>
        </form>
    </div>
</body>
</html>