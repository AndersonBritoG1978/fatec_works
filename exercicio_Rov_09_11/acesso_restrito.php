<?php
session_start();

if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Conexão com o banco de dados
$dsn = 'mysql:host=localhost;dbname=bdlogin0911';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

// Consulta os registros da tabela tbagenda
$stmt = $pdo->query('SELECT * FROM tbagenda');
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acesso Restrito</title>
</head>
<body>
    <h1>Acesso Restrito</h1>
    
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>Email</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?php echo $registro['Nome']; ?></td>
                <td><?php echo $registro['Telefone']; ?></td>
                <td><?php echo $registro['Celular']; ?></td>
                <td><?php echo $registro['Endereço']; ?></td>
                <td><?php echo $registro['Email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <br>
    <button onclick="location.href='acesso_restrito.php'">Consultar Mais Registros</button>
    <button onclick="location.href='index.php'">Sair</button>
</body>
</html>
