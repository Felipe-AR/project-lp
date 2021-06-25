<?php
    include '../database/database.php';

    $jogador = trim($_POST['jogador']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $pokemon = trim($_POST['pokemon']);

    if (!(empty($jogador) || empty($cidade) || empty($estado) || empty($pokemon))) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO JOGADOR (nome, cidade, estado, inicial) VALUES (?, ?, ?, ?)";
            $query = $pdo->prepare($sql);
            $query->execute(array($jogador, $cidade, $estado, $pokemon));
            Database::disconnect();
            header("location: cadastrar.php");
    }
?>