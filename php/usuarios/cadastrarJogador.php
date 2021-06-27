<?php
    include '../database/database.php';

    if (isset($_POST['jogador']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['pokemon']) && isset($_POST['pokebola']) && isset($_POST['quantidade'])) {
        $jogador = trim($_POST['jogador']);
        $cidade = trim($_POST['cidade']);
        $estado = trim($_POST['estado']);
        $pokemon = trim($_POST['pokemon']);
        $pokebola = trim($_POST['pokebola']);
        $quantidade = trim($_POST['quantidade']);

        if (!(empty($jogador) || empty($cidade) || empty($estado) || empty($pokemon) || empty($pokebola) || empty($quantidade))) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO JOGADOR (nome, cidade, estado, inicial, pokebola, qtdPokebola) VALUES (?, ?, ?, ?, ?, ?)";
                $query = $pdo->prepare($sql);
                $query->execute(array($jogador, $cidade, $estado, $pokemon, $pokebola, $quantidade));
                Database::disconnect();
                header("location: cadastrar.php");
        } else {
            header("location: cadastrar.php");
        }
    } else {
        header("location: cadastrar.php");
    }
?>