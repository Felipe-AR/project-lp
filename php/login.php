<?php
    include 'database/database.php';

    $email = trim($_POST['email']);
    $password = md5(trim($_POST['senha']));

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM USUARIOS WHERE EMAIL LIKE ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($user));
    $user = $query->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    if ($dbUser['senha'] == $password) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $user['nome'];
        header("location: painel.php");
    }
?>