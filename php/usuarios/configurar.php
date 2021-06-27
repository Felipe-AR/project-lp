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
        $sql = "SELECT J.ID, J.NOME, J.CIDADE, J.ESTADO, P.NOME AS INICIAL, J.QTDPOKEBOLA FROM JOGADOR AS J
        INNER JOIN POKEMON AS P ON (P.ID = J.INICIAL) ORDER BY J.NOME";
    else
        $sql = "SELECT J.ID, J.NOME, J.CIDADE, J.ESTADO, P.NOME AS INICIAL FROM JOGADOR AS J
        INNER JOIN POKEMON AS P ON (P.ID = J.INICIAL) WHERE J.NOME LIKE '%$pesquisa%' ORDER BY J.NOME";

    $jogadores = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br" class="h-100">

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
                    <a href="../usuarios/usuario.php" class="btn btn-primary btn-lg">Voltar</a>
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Configurar Jogador</h1>
                </div>
                <form action="configurar.php" method="GET">
                    <div class="input-group">
                        <input type="text" id="" class="form-control" name="pesquisa" placeholder="Digitar o nome do jogador">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table table-hover table-striped table-responsive-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Inicial</th>
                            <th>Quantidade Pokébola</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jogadores as $jogador) { ?>
                        <tr>
                            <td id="tdId"><?php echo $jogador['ID']?></td>
                            <td id="tdNome"><?php echo $jogador['NOME']?></td>
                            <td id="tdCidade"><?php echo $jogador['CIDADE']?></td>
                            <td id="tdEstado"><?php echo $jogador['ESTADO']?></td>
                            <td id="tdInicial"><?php echo $jogador['INICIAL']?></td>
                            <td id="quantidadePokebolas"><?php echo $jogador["QTDPOKEBOLA"]?></td>
                            <td>
                                <button id="btnEdit" type="button" class="btn btn-success col-lg-3 col-sm-12"><i class="fa fa-user-edit"></i></button>
                                <button id="btnRemove" type="button" class="btn btn-danger col-lg-3 col-sm-12"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
    <script>
        let buttonsEdit = document.querySelectorAll("#btnEdit")
        let buttonsRemove = document.querySelectorAll("#btnRemove")

        buttonsEdit.forEach(button => {
            button.addEventListener("click", (e) => {
                let clickedButton = e.target
                let buttonGroup = e.target.parentNode
                let rowOfButton = buttonGroup.parentNode
                let idJogador = rowOfButton.querySelector("#tdId").textContent
                let nextPage = "editarJogador.php"
                
                location.replace(`${nextPage}?id=${idJogador}`)
            })
        })

        buttonsRemove.forEach(button => {
            button.addEventListener("click", (e) => {
                let clickedButton = e.target
                let buttonGroup = e.target.parentNode
                let rowOfButton = buttonGroup.parentNode
                let idJogador = rowOfButton.querySelector("#tdId").textContent
                let confirm = window.confirm("Deseja confirmar a exclusão do jogador?");
                if (confirm)
                    location.href = `removerUsuario.php?id=${idJogador}`;
            })
        })
    </script>
</body>

</html>