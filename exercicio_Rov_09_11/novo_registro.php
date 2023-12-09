<?php
session_start();

if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (código de inserção no banco de dados)

    // Verifique se a busca do CEP foi acionada
    if (isset($_POST['btnbuscaCEP'])) {
        // Chama a função JavaScript para buscar o CEP
        echo "<script>buscarCEP();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Registro</title>
    <script>
        function buscarCEP() {
            const cep = document.getElementById('cep').value;
            const url = `https://viacep.com.br/ws/${cep}/json/`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado!');
                    } else {
                        document.getElementById('endereco').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao buscar informações de CEP');
                });
        }
    </script>
</head>
<body>
    <h1>Criar Novo Registro</h1>
    
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <!-- Campos preenchidos pela busca de CEP -->
        <br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">
        <br><br>
        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular">
        <br><br>
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep">
        <input type="button" name="btnbuscaCEP" id="btnbuscaCEP" value="Buscar CEP" onclick="buscarCEP()">
        <br><br>
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco">
        <br><br>
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro">
        <br><br>
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade">
        <br><br>
        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
