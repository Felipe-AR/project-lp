<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $pokemon = trim($_POST['pokemon']);
    $quantidade = trim($_POST['quantidade']);

    if(!empty($id) && !empty($nome) && !empty($estado) && !empty($pokemon)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($quantidade > 0) {
                $sqlConsulta = "SELECT JOGADOR.QTDPOKEBOLA FROM JOGADOR WHERE ID = '$id'";
                $query = $pdo->query($sqlConsulta);
                $quantidadeAtual = $query->fetch(PDO::FETCH_ASSOC)["QTDPOKEBOLA"];
                $somaQuantidade = $quantidadeAtual + $quantidade;

                $sqlUpdate =  "UPDATE JOGADOR SET NOME = '$nome', CIDADE = '$cidade', ESTADO = '$estado', INICIAL = '$pokemon', QTDPOKEBOLA = '$somaQuantidade' WHERE ID = '$id'";
                $query = $pdo->query($sqlUpdate);
                header("location: editarJogador.php?id=" . $id);
        } else {
            $sql = "UPDATE JOGADOR SET NOME = '$nome', CIDADE = '$cidade', ESTADO = '$estado', INICIAL = '$pokemon' WHERE ID = '$id'";
            $query = $pdo->query($sql);
            header("location: editarJogador?id=" . $id);
        }
        Database::disconnect();
    } else {
        header("location: editarJogador?id=" . $id);
    }
?>