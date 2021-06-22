<?php
    include 'database/database.php';

    $email = trim($_POST['email']);
    $password = md5(trim($_POST['senha']));

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM USUARIOS WHERE EMAIL LIKE ?;";
    $query = $pdo->prepare($sql);
    $query->execute(array($email));
    Database::disconnect();
    
    if ($query->rowCount() != 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user['senha'] == $password) {
            session_start();
            $_SESSION['email'] = $user['email'];
            $_SESSION['usuario'] = $user['usuario'];
            header("location: painel.php");
        }
    } else {
        header("location: index.php");
    }
        
?>