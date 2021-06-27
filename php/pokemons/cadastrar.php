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
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Cadastrar Pokémon</h1>
                </div>
                <form action="cadastrarPokemon.php" method="POST" class="w-100 needs-validation" novalidate>
                    <div class="form-group p-1">
                        <label for="pokemon" class="sr-only">Nome do Pokemon</label>
                        <input type="text" class="form-control form-control-lg" id="pokemon" placeholder="Pokémon" name="pokemon" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="tipo" class="sr-only">Tipo do Pokémon</label>
                        <select id="tipo" class="form-control form-control-lg text-muted" name="tipo" required>
                            <option class="text-muted" value="" disabled selected>Escolha o tipo do Pokémon</option>
                        <?php foreach ($tipos as $tipo) { ?>
                            <option value="<?php echo $tipo['id']?>"><?php echo $tipo['descricao']?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg">
                        <a href="./pokemon.php" class="btn btn-danger btn-lg">Voltar</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/formValidate.js"></script>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
</body>

</html>