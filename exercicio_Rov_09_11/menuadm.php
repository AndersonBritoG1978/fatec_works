<?php

//A SESSÃO PRECISA SER INICIADA EM CADA PÁGINA DIFERENTE
if (!isset($_SESSION)) session_start();

//VERIFICA SE NÃO HÁ A VARIÁVEL DA SESSÃO QUE INDENTIFICA O USUÁRIO
if (!isset($_SESSION['login'])) {
    //DESTRIO A SESSÃO POR SEGURÂNÇA
    session_destroy();
    //REDIRECIONA O VISITANTE DE VOLTA PARA O LOGIN
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu Administrador - Usuários tipo 1</title>
    <style>
        .usuario {
            font-weight: bold;
            font-size: 18px;
        }
        .botoes {
            margin-top: 20px;
        }
        .botoes button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
    $usuario = $_SESSION['login'];
    ?>
    <h1>Bem-vindo, <span class="usuario"><?php echo $usuario; ?></span>!</h1>
    
    <div class="botoes">
        <button onclick="location.href='consultar_registros.php'">Consultar Registros</button>
        <button onclick="location.href='novo_registro.php'">Criar Novo Registro</button>
        <form action="index.php" method="post">
        <input type="submit" value="Sair">
        </form>
    </div>
</body>
</html>
