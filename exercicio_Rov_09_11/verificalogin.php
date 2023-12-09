<?php
//Conexão com Banco de Dados

$dsn = 'mysql:host=localhost;dbname=dblogin0911';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO($dsn,$usuario,$senha);
} catch (PDOException $e){
    echo'ERRO: '. $e->getMessage();
}

//Verifica se o formulário foi enviado

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //RECEBE DADOS DO FORMULÁRIO
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    //PREPARA CONSULTA PARA BUSCAR USUÁRIO NO BANCO DE DADOS
    $stmt = $pdo->prepare('SELECT * FROM tbusuarios WHERE login = :login');
    $stmt->bindParam(':login',$login);
    $stmt->execute();

    //VERIFICA SE O USUÁRIO EXISTE E SE A SENHA CONFERE
    if ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
        $usuarioRec = $usuario['senha'];

        if($senha==$usuarioRec){

            session_start();
        $_SESSION['login'] = true;
            
        //VERIFICA O TIPO DE USUÁRIO TEM ACESSO COMPLETO OU RESTRITO

        if($usuario['tipo'] == '1'){
            //ENVIA PARA MENU ADMINISTRADOR
            header('location: menuadm.php');
        } else{
            //ENVIA PARA ACESSO RESTRITO - SOMENTE CONSULTA
            header('Location: acesso_restrito.php');
    }
    }else {
            echo 'Usuário não encontrado.';
        }}}
?>
