<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_GET['id']);

    // posteriormente realizar uma validação se já existe um usuário utilizando essa pokébola, antes de realizar a exclusão.


    if (!empty($id)) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlSelectJogador = "SELECT * FROM JOGADOR INNER JOIN POKEBOLA ON (POKEBOLA.ID = JOGADOR.POKEBOLA) WHERE POKEBOLA.ID = ?";
        $query = $pdo->prepare($sqlSelectJogador);
        $query->execute(array($id));

        echo $query->rowCount();

        if($query->rowCount() > 0) {
            header("location: configurar.php?erro=" . $query->rowCount());
        } else {
            $sqlRemovePokebola = "DELETE FROM POKEBOLA WHERE ID = ?";
            $query = $pdo->prepare($sqlRemovePokebola);
            $query->execute(array($id));
            header("location: configurar.php");
        }
        Database::disconnect();
    } else {
        header("location: configurar.php");
    }
?>