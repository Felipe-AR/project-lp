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
        $sql = "SELECT * FROM POKEBOLA ORDER BY NOME";
    else
        $sql = "SELECT * FROM POKEBOLA WHERE NOME LIKE '%$pesquisa%'";
    $pokebolas = $pdo->query($sql);

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
                <div class="d-flex mb-2">
                    <a href="./pokebola.php" class="btn btn-primary btn-lg">Voltar</a>
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Consultar Pokébola</h1>
                </div>
                <form action="consultar.php" method="GET">
                    <div class="input-group"> 
                        <input type="text" id="" class="form-control" name="pesquisa" placeholder="Digitar o nome do pokémon">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pokebolas as $pokebola) { ?>
                        <tr>
                            <td><?php echo $pokebola["id"]?></td>
                            <td><?php echo $pokebola["nome"]?></td>
                            <td><?php echo $pokebola["cor"]?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
</body>

</html>


































