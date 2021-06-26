<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $pokemon = trim($_POST['pokemon']);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE JOGADOR SET NOME = '$nome', CIDADE = '$cidade', ESTADO = '$estado', INICIAL = '$pokemon' WHERE ID = '$id'";
    $query = $pdo->query($sql);
    header("location: editarJogador?id='$id'");
    Database::disconnect();
?>