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
        $sql = "SELECT * FROM JOGADOR ORDER BY NOME";
    else
        $sql = "SELECT * FROM JOGADOR WHERE NOME LIKE '%" . $pesquisa . "%' ORDER BY NOME";

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
                <h1 class="m-5">Configurar Jogador</h1>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jogadores as $jogador) { ?>
                        <tr>
                            <td id="tdId"><?php echo $jogador['id']?></td>
                            <td id="tdNome"><?php echo $jogador['nome']?></td>
                            <td id="tdCidade"><?php echo $jogador['cidade']?></td>
                            <td id="tdEstado"><?php echo $jogador['estado']?></td>
                            <td>
                                <button id="btnEdit" type="button" class="btn btn-success col-lg-3 col-sm-12"><i class="fa fa-user-edit"></i></button>
                                <button id="btnRemove" type="button" class="btn btn-danger col-lg-3 col-sm-12"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="../usuarios/usuario.php" class="btn btn-primary">Voltar</a>
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
                let currentPage = "editarJogador.php"
                
                location.replace(`${currentPage}?id=${idJogador}`)
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