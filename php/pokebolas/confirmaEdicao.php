<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_POST['id']);
    $pokebola = trim($_POST['pokebola']);
    $cor = trim($_POST['cor']);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE POKEBOLA SET NOME = '$pokebola', COR = '$cor' WHERE ID = '$id'";
    $query = $pdo->query($sql);
    header("location: editarPokebola.php?id=" . $id);
?>