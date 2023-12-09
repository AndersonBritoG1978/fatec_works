<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consultar Registros</title>
</head>
<body>
    <h1>Consultar Registros</h1>
    
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?php echo $registro['Nome']; ?></td>
                <td><?php echo $registro['Telefone']; ?></td>
                <td><?php echo $registro['Celular']; ?></td>
                <td><?php echo $registro['Endereço']; ?></td>
                <td><?php echo $registro['Email']; ?></td>
                <td>
                    <!-- Botões para Alterar e Excluir com confirmação de senha -->
                    <form action="confirmar_alterar_registro.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $registro['CodCliente']; ?>">
                        <input type="submit" value="Alterar" onclick="return confirm('Confirme a senha para alterar o registro')">
                    </form>
                    <form action="confirmar_excluir_registro.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $registro['CodCliente']; ?>">
                        <input type="submit" value="Excluir" onclick="return confirm('Confirme a senha para excluir o registro')">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
