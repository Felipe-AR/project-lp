<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    if(isset($_POST['pokebola']) && isset($_POST['cor'])) {
        $nome = trim($_POST['pokebola']);
        $cor = trim($_POST['cor']);
        if (!empty($nome) && !empty($cor)) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO POKEBOLA (nome, cor) VALUES (?, ?)";
            $query = $pdo->prepare($sql);
            $query->execute(array($nome, $cor));
            Database::disconnect();
            header("location: cadastrar.php");
        }
    }
?>