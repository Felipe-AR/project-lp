<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_GET['id']);

    // posteriormente realizar uma validação se já existe um usuário utilizando essa pokébola, antes de realizar a exclusão.

    if (!empty($id)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM POKEBOLA WHERE ID = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($id));
        header("location: configurar.php");

        Database::disconnect();
    }
?>