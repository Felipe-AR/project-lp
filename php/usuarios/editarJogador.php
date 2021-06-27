<?php
include '../loginConfirm.php';
include '../database/database.php';

$id = trim($_GET['id']);

if (!empty($id)) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT J.ID, J.NOME, J.CIDADE, J.ESTADO, J.INICIAL, P.NOME AS POKEMON, PB.NOME AS POKEBOLA FROM JOGADOR AS J 
    INNER JOIN POKEMON AS P 
    ON (P.ID = J.INICIAL)
    INNER JOIN POKEBOLA AS PB
    ON (PB.ID = J.POKEBOLA)
    WHERE J.ID = " . $id;
    $query = $pdo->query($sql);
    $jogador = $query->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM POKEMON";
    $pokemons = $pdo->query($sql);
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
                <h1 class="m-5 text-center">Configurar Jogador</h1>
                <form action="confirmaEdicao.php" method="POST" class="w-100">
                    <div class="form-group p-1">
                        <label for="id"><?php echo "Identificação do Usuário: " . $jogador["ID"] ?></label>
                        <input type="hidden" id="id" name="id" value="<?php echo $jogador["ID"] ?>">
                    </div>
                    <div class="form-group p-1">
                        <label for="nome" class="sr-only">Nome do Jogador</label>
                        <input type="text" class="form-control form-control-lg" id="nome" value="<?php echo $jogador["NOME"] ?>" name="nome">
                    </div>
                    <div class="form-group p-1">
                        <label for="cidade" class="sr-only">Cidade do Jogador</label>
                        <input type="text" class="form-control form-control-lg" id="cidade" value="<?php echo $jogador["CIDADE"] ?>" name="cidade">
                    </div>
                    <div class="form-group p-1">
                        <label for="estado" class="sr-only">Estado do Jogador</label>
                        <input type="text" class="form-control form-control-lg" id="estado" value="<?php echo $jogador["ESTADO"] ?>" name="estado">
                    </div>
                    <div class="form-group p-1">
                        <label for="pokemon" class="sr-only">Nome do Pokemon</label>
                        <select id="pokemon" class="form-control form-control-lg" name="pokemon">
                            <option value="<?php echo $jogador['INICIAL'] ?>" selected>
                                <?php echo "Inicial: " . $jogador['POKEMON'] ?>
                            </option>
                            <?php foreach ($pokemons as $pokemon) { ?>
                                <option value="<?php echo $pokemon['id'] ?>">
                                    <?php echo $pokemon['nome'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <h3 class="mt-2 text-center">Aumentar Pokébola</h1>
                    <div class="form-group p-1 w-100">
                        <div class="text-center">
                            <span><?php echo "Pokébola: " . $jogador["POKEBOLA"] . " +"; ?></span>
                            <label for="quantidade" id="labelQuantidade"></label>
                        </div>
                        <input type="range" name="quantidade" id="quantidade" class="form-range p-5" min="0" max="10" step="1">
                    </div>
                    <div class="mt-2 text-center">
                        <input type="submit" value="Confirmar" class="btn btn-success btn-lg">
                        <a href="../usuarios/configurar.php" class="btn btn-danger btn-lg">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
    <script>
        let buttonsEdit = document.querySelectorAll("#btnEdit")
        let buttonsRemove = document.querySelectorAll("btnRemove")
        let quantidadePokeball = document.querySelector("#quantidade")
        let quantidadeLabel = document.querySelector("#labelQuantidade")

        quantidadePokeball.value = 0
        quantidadeLabel.textContent = quantidadePokeball.value;

        quantidadePokeball.addEventListener("change", () => {
            quantidadeLabel.textContent = quantidadePokeball.value;
        })

        buttonsEdit.forEach(button => {
            button.addEventListener("click", (e) => {
                let clickedButton = e.target
                let buttonGroup = e.target.parentNode
                let rowOfButton = buttonGroup.parentNode
                let idJogador = rowOfButton.querySelector("#tdNome").textContent
                let nextPage = "usuario.php"

                location.replace(`${currentPage}?pesquisa=${idJogador}`)
            })
        })
    </script>
</body>

</html>