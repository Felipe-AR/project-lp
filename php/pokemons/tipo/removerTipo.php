<?php
    include '../../loginConfirm.php';
    include '../../database/database.php';

    $id = $_GET['id'];

    if(!empty($id)) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlSelectPokemon = "SELECT * FROM POKEMON INNER JOIN POKEMON_TIPO ON (POKEMON_TIPO.ID = POKEMON.TIPO) WHERE POKEMON.TIPO = ?";
        $query = $pdo->prepare($sqlSelectPokemon);
        $query->execute(array($id));

        if($query->rowCount() > 0) {
            header("location: configurar.php?erro=" . $query->rowCount());
        } else {
            $sqlRemoveTipo = "DELETE FROM POKEMON_TIPO WHERE POKEMON_TIPO.ID = ?";
            $query = $pdo->prepare($sqlRemoveTipo);
            $query->execute(array($id));
            header("location: configurar.php");
        }
    }
?>