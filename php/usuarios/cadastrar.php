<?php
include '../loginConfirm.php';
include '../database/database.php';

$pdo = Database::connect();
$sql = "SELECT * FROM POKEMON ORDER BY NOME";
$pokemons = $pdo->query($sql);

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
                <form action="cadastrarJogador.php" method="POST" class="w-100">
                <h1 class="text-uppercase fs-1 fw-bold">Cadastrar Jogador</h1>
                    <div class="form-group p-1">
                        <label for="nome" class="sr-only">Nome do Jogador</label>
                        <input type="text" class="form-control form-control-lg" id="jogador" placeholder="Jogador" name="jogador">
                    </div>
                    <div class="form-group p-1">
                        <label for="cidade" class="sr-only">Cidade do Jogador</label>
                        <input type="text" class="form-control form-control-lg" id="cidade" placeholder="Cidade" name="cidade">
                    </div>
                    <div class="form-group p-1">
                        <label for="estado" class="sr-only">Estado do Jogador</label>
                        <input type="text" class="form-control form-control-lg" id="estado" placeholder="Estado" name="estado">
                    </div>
                    <div class="form-group p-1">
                        <label for="pokemon" class="sr-only">Nome do Pokemon</label>
                        <select id="pokemon" class="form-select form-select-lg text-muted" name="pokemon">
                            <option class="text-muted" value="" disabled selected>Escolha o Pokemon Inicial</option>
                        <?php foreach ($pokemons as $pokemon) { ?>
                            <option value="<?php echo $pokemon['id']?>"><?php echo $pokemon['nome']?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg">
                        <a href="../usuarios/usuario.php" class="btn btn-danger btn-lg">Voltar</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
</body>

</html>