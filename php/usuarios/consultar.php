<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    if (isset($_GET['pesquisa']))
        $pesquisa = $_GET['pesquisa'];
    else
        $pesquisa = "";


    $pdo = Database::connect();
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pesquisa == "") 
        $sql = "SELECT J.ID, J.NOME, J.CIDADE, J.ESTADO, P.NOME AS POKEMON FROM JOGADOR 
        AS J INNER JOIN POKEMON AS P ON (P.ID = J.INICIAL) ORDER BY NOME";
    else
        $sql = "SELECT J.ID, J.NOME, J.CIDADE, J.ESTADO, P.NOME 
                AS POKEMON FROM JOGADOR AS J INNER JOIN POKEMON AS P ON (P.ID = J.INICIAL) 
                WHERE J.NOME LIKE '%" . $pesquisa. "%' ORDER BY NOME";

    $jogadores = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../lib/bootstrap.min.css">
    <link rel="stylesheet" href="../../lib/fontawesome/css/all.min.css">
    <title>Painel de Acesso</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">
                <h1 class="m-5">Consultar Jogadores</h1>
                <form action="consultar.php" method="GET">
                    <div class="input-group">
                        <input type="text" id="" class="form-control" name="pesquisa" placeholder="Digitar o nome do jogador">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table table-hover table-striped table-borderless">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Inicial</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jogadores as $jogador) { ?>
                        <tr>
                            <td><?php echo $jogador["ID"]?></td>
                            <td><?php echo $jogador["NOME"]?></td>
                            <td><?php echo $jogador["CIDADE"]?></td>
                            <td><?php echo $jogador["ESTADO"]?></td>
                            <td><?php echo $jogador["POKEMON"]?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="../usuarios/usuario.php" class="btn btn-danger btn-lg">Voltar</a>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
</body>

</html>


































