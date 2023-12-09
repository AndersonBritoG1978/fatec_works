<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['login'])) {
    header("Location: index.php"); // Redireciona para a página de login, se não estiver autenticado
    exit;
}

// Verifica se foi submetido um ID válido para a alteração
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id']; // Obtém o ID do registro a ser alterado

    // Se a verificação for bem-sucedida, redirecione para a página de alteração do registro
    header("Location: alterar_registro.php?id=$id");
    exit;
} else {
    echo "Erro: ID inválido ou não fornecido.";
}
?>
