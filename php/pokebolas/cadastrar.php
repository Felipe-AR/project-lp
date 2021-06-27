<?php
include '../loginConfirm.php';
include '../database/database.php';

$pdo = Database::connect();
$sql = "SELECT * FROM POKEMON_TIPO ORDER BY DESCRICAO";
$tipos = $pdo->query($sql);

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
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Cadastrar Pokébola</h1>
                </div>
                <form action="cadastrarPokebola.php" method="POST" class="w-100 needs-validation" novalidate>
                    <div class="form-group p-1">
                        <label for="pokebola" class="sr-only">Nome da Pokébola</label>
                        <input type="text" class="form-control form-control-lg" id="pokebola" placeholder="Nome da Pokébola" name="pokebola" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="cor" class="sr-only">Cor Primária da Pokébola</label>
                        <input type="text" class="form-control form-control-lg" id="cor" placeholder="Cor Primária da Pokébola" name="cor" required>
                    </div>
                    <div class="mt-2">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg" required>
                        <a href="./pokebola.php" class="btn btn-danger btn-lg">Voltar</a>
                    </div>
                    <div class="invalid-feedback">Por favor informar o nome da pokébola</div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
    <script src="../../js/formValidate.js"></script>
</body>

</html>