<?php
include '../../loginConfirm.php';
include '../../database/database.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../lib/bootstrap.min.css">
    <link rel="stylesheet" href="../../../lib/fontawesome/css/all.min.css">
    <title>Painel de Acesso</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mt-5">
                <div class="d-flex mb-2">
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Cadastrar Tipo</h1>
                </div>
                <form action="cadastrarTipo.php" method="POST" class="w-100 needs-validation" novalidate>
                    <div class="form-group p-1">
                        <label for="descricao" class="sr-only">Descrição do Tipo do Pokémon</label>
                        <input type="text" class="form-control form-control-lg" id="descricao" placeholder="Descrição do Tipo do Pokémon" name="descricao" required>
                    </div>
                    <div class="mt-2 text-center">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg">
                        <a href="./tipo.php" class="btn btn-danger btn-lg">Voltar</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../lib/fontawesome/js/all.min.js"></script>
    <script src="../../../js/formValidate.js"></script>
</body>

</html>