<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_GET['id']);

    if (!empty($id)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM POKEBOLA WHERE ID = '$id'";
        $query = $pdo->query($sql);
        $pokebola = $query->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
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
            <div class="mt-5">
                <h1 class="m-5 text-center">Configurar Pokébola</h1>
                <form action="confirmaEdicao.php" method="POST" class="w-100 needs-validation" novalidate>
                    <div class="form-group p-1">
                        <label for="id"><?php echo "Identificação do Pokémon: " . $pokebola["id"]?></label>
                        <input type="hidden" id="id" name="id" value="<?php echo $pokebola["id"]?>">
                    </div>
                    <div class="form-group p-1">
                        <label for="pokebola" class="sr-only">Nome do Pokébola</label>
                        <input type="text" class="form-control form-control-lg" id="nome" value="<?php echo $pokebola["nome"]?>" name="pokebola" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="cor" class="sr-only">Cor Primaria da Pokébola</label>
                        <input type="text" class="form-control form-control-lg" id="nome" value="<?php echo $pokebola["cor"]?>" name="cor" required>
                    </div>
                    <div class="mt-2 text-center">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg" required>
                        <a href="./configurar.php" class="btn btn-danger btn-lg">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
    <script src="../../js/formValidate.js"></script>
</body>

</html>