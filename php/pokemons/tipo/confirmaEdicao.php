<?php
    include '../../loginConfirm.php';
    include '../../database/database.php';

    $id = trim($_POST['id']);
    $descricao = trim($_POST['descricao']);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE POKEMON_TIPO SET DESCRICAO = '$descricao' WHERE ID = '$id'";
    $query = $pdo->query($sql);

    header("location: editarTipo.php?id=" . $id);
    Database::disconnect();
?>