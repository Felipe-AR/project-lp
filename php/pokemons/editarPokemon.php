<?php
    include '../loginConfirm.php';
    include '../database/database.php';

    $id = trim($_GET['id']);

    if (!empty($id)) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT P.ID, P.NOME, P.TIPO AS idTipo, PT.DESCRICAO AS TIPO FROM POKEMON AS P 
        INNER JOIN POKEMON_TIPO AS PT ON (PT.ID = P.TIPO) WHERE P.ID = " . $id;
        $query = $pdo->query($sql);
        $pokemon = $query->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM POKEMON_TIPO";
        $tipos = $pdo->query($sql);
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
                <h1 class="m-5 text-center">Configurar Pokémon</h1>
                <form action="confirmaEdicao.php" method="POST" class="w-100 needs-validation" novalidate>
                    <div class="form-group p-1">
                        <label for="id"><?php echo "Identificação do Pokémon: " . $pokemon["ID"]?></label>
                        <input type="hidden" id="id" name="id" value="<?php echo $pokemon["ID"]?>">
                    </div>
                    <div class="form-group p-1">
                        <label for="nome" class="sr-only">Nome do Pokémon</label>
                        <input type="text" class="form-control form-control-lg" id="nome" value="<?php echo $pokemon["NOME"]?>" name="nome" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="tipo" class="sr-only">Nome do Pokemon</label>
                        <select id="tipo" class="form-select form-select-lg" name="tipo" required>
                            <option value="<?php echo $pokemon['idTipo']?>" selected>
                                <?php echo "Atual: " . $pokemon['TIPO']?>
                            </option>
                            <?php foreach($tipos as $tipo) { ?>
                                <option value="<?php echo $tipo['id']?>">
                                    <?php echo $tipo['descricao']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mt-2 text-center">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg">
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