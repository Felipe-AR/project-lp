<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_GET['id']);

    if (!empty($id)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM JOGADOR WHERE ID = '$id'";
        $query = $pdo->query($sql);
        Database::disconnect();
        header("location: configurar.php");
    }
?>