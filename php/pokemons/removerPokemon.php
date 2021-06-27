<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_GET['id']);

    if (!empty($id)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlSelectJogador = "SELECT * FROM JOGADOR 
        INNER JOIN POKEMON ON (POKEMON.ID = JOGADOR.INICIAL) 
        WHERE JOGADOR.INICIAL = ?";
        $query = $pdo->prepare($sqlSelectJogador);
        $query->execute(array($id));

        if($query->rowCount() > 0) {
            header("location: configurar.php?erro=" . $query->rowCount());
        } else {
            $sqlRemovePokemon = "DELETE FROM POKEMON WHERE POKEMON.ID = ?";
            $query = $pdo->prepare($sqlRemovePokemon);
            $query->execute(array($id));
            header("location: configurar.php");
        }
        Database::disconnect();
    }
?>