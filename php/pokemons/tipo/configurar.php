<?php
    include '../../loginConfirm.php';
    include '../../database/database.php';

    if (isset($_GET['pesquisa']))
        $pesquisa = $_GET['pesquisa'];
    else
        $pesquisa = "";

    $pdo = Database::connect();
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pesquisa == "")
        $sql = "SELECT PT.ID, PT.DESCRICAO FROM POKEMON_TIPO AS PT 
        ORDER BY PT.DESCRICAO";
    else
        $sql = "SELECT PT.ID, PT.DESCRICAO FROM POKEMON_TIPO AS PT
        WHERE PT.DESCRICAO LIKE '%$pesquisa%' 
        ORDER BY PT.DESCRICAO";
    $tipos = $pdo->query($sql);
    
?>

<!DOCTYPE html>
<html lang="pt-br" class="h-100">

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
            <div class="text-center mt-5">
                <div class="d-flex mb-2">
                    <a href="./tipo.php" class="btn btn-primary btn-lg">Voltar</a>
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Configurar Tipo do Pokémon</h1>
                </div>
                <?php 
                    if(isset($_GET['erro'])) { 
                    $erros = $_GET['erro'];
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p>
                            <i class="fa fa-exclamation-triangle"></i> O tipo selecionado não pode ser removido, pois <?php echo $erros ?> pokémon(s) possuem esse tipo.
                        </p>
                        <a class="text-muted text-decoration-none fw-bold" href="../../pokemons/configurar.php">
                            <i class="fa fa-sign-in-alt"></i>
                            Redirecionar para a seção de pokémons
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <form action="configurar.php" method="GET">
                    <div class="input-group">
                        <input type="text" id="" class="form-control" name="pesquisa" placeholder="Digitar o nome do pokémon    ">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table table-hover table-striped table-responsive-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tipos as $tipo) { ?>
                        <tr>
                            <td id="tdId"><?php echo $tipo["ID"]?></td>
                            <td id="tdNome"><?php echo $tipo["DESCRICAO"]?></td>
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
    <script src="../../../lib/bootstrap.min.js"></script>
    <script src="../../../lib/fontawesome/js/all.min.js"></script>
    <script>
        let buttonsEdit = document.querySelectorAll("#btnEdit")
        let buttonsRemove = document.querySelectorAll("#btnRemove")

        buttonsEdit.forEach(button => {
            button.addEventListener("click", (e) => {
                let clickedButton = e.target
                let buttonGroup = e.target.parentNode
                let rowOfButton = buttonGroup.parentNode
                let idTipo = rowOfButton.querySelector("#tdId").textContent
                let nextPage = "editarTipo.php"
                
                location.replace(`${nextPage}?id=${idTipo}`)
            })
        })

        buttonsRemove.forEach(button => {
            button.addEventListener("click", (e) => {
                let clickedButton = e.target
                let buttonGroup = e.target.parentNode
                let rowOfButton = buttonGroup.parentNode
                let idTipo = rowOfButton.querySelector("#tdId").textContent
                let confirm = window.confirm("Deseja confirmar a exclusão do pokémon?");
                if (confirm)
                    location.href = `removerTipo.php?id=${idTipo}`;
            })
        })
    </script>
</body>

</html>