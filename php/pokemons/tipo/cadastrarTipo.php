<?php
    include '../../database/database.php'; 

    if(isset($_POST["descricao"])) {
        $descricao = trim($_POST["descricao"]);
        if (!empty($descricao)) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO POKEMON_TIPO (descricao) VALUES (?)";
            $query = $pdo->prepare($sql);
            $query->execute(array($descricao));
            Database::disconnect();
            header("location: cadastrar.php");
        } else {
            header("location: cadastrar.php");
        }
    } else {
        header("location: cadastrar.php");
    }
?>