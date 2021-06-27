<?php
    include '../database/database.php';

    if (isset($_POST['pokemon']) && isset($_POST['tipo'])) {
        $pokemon = trim($_POST['pokemon']);
        $tipo = trim($_POST['tipo']);
        if (!(empty($pokemon) || empty($tipo))) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO POKEMON (nome, tipo) VALUES (?, ?)";
                $query = $pdo->prepare($sql);
                $query->execute(array($pokemon, $tipo));
                Database::disconnect();
                header("location: cadastrar.php");
        } else {
            header("location: cadastrar.php");
        }
    } else {
        header("location: cadastrar.php");
    }
?>