<?php
    include 'database/database.php';

    $user = trim($_POST['usuario']);
    $password = md5(trim($_POST['senha']));

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM USUARIOS WHERE USUARIO LIKE ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($user));
    $dbUser = $query->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if ($dbUser['senha'] == $password) {
        session_start();
        $_SESSION['usuario'] = $user;
        $_SESSION['nome'] = $dbUser['nome'];
    }
?>