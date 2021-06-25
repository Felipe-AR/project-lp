<?php
    include '../loginConfirm.php';
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
                <a href="../painel.php" class="btn btn-primary btn-lg w-25">Voltar</a>
            </div>
            <div class="card-group bg-light mt-5">
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                    <div class="card border-0">
                        <div class="text-center">
                            <i class="fa fa-user-plus fa-10x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Cadastrar Usuário</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi accusamus at quaerat quae molestias atque fugit cum. Minus quibusdam, laborum dolores cumque ex architecto esse, consequatur incidunt perspiciatis cupiditate laboriosam!</p>
                            <a href="./cadastrar.php" class="btn btn-success w-100 btn-block">Cadastrar usuários</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                    <div class="card border-0">
                        <div class="text-center">
                            <i class="fa fa-search fa-10x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Consultar Usuário</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi accusamus at quaerat quae molestias atque fugit cum. Minus quibusdam, laborum dolores cumque ex architecto esse, consequatur incidunt perspiciatis cupiditate laboriosam!</p>
                            <a href="./consultar.php" class="btn btn-success w-100 btn-block">Consultar Usuário</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                    <div class="card border-0">
                        <div class="text-center">
                            <i class="fa fa-user-edit fa-10x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Configurar Usuário</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi accusamus at quaerat quae molestias atque fugit cum. Minus quibusdam, laborum dolores cumque ex architecto esse, consequatur incidunt perspiciatis cupiditate laboriosam!</p>
                            <a href="./configurar.php" class="btn btn-success w-100 btn-block">Configurar Usuário</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
</body>

</html>