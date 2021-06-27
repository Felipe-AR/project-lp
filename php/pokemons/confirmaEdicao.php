<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $tipo = trim($_POST['tipo']);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE POKEMON SET NOME = '$nome', TIPO = '$tipo' WHERE ID = '$id'";
    $query = $pdo->query($sql);
    header("location: editarPokemon?id=" . $id);
?>