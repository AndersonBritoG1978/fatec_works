<?php
session_start();
//Código para destruira sessão toda vez que a página for carregada.
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Autenticação de Usuário</title>
</head>
<body>
    <h1>Login</h1>
    <form action="verificalogin.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <input type="submit" value="Entrar">
</form>
</html>
