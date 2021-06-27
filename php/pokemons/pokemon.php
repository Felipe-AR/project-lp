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
                <div class="d-flex mb-2">
                    <a href="../painel.php" class="btn btn-primary btn-lg">Voltar</a>
                    <h1 class="mx-auto text-uppercase fs-1 fw-bold">Seção de Pokémons</h1>
                </div>
            </div>
            <div class="card-group">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center p-5">
                            <i class="fas fa-dragon fa-10x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Cadastrar Pokémon</h5>
                            <p class="card-text text-center">Realizar o cadastro dos jogadores de Pokemón</p>
                            <div class="mt-auto">
                                <a href="./cadastrar" class="btn btn-success btn-block w-100">Cadastrar Pokémons</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center p-5">
                            <i class="fas fa-search fa-10x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Consultar Pokémons</h5>
                            <p class="card-text text-center">Realizar a consulta dos jogadores de Pokemón cadastrados na aplicação</p>
                            <div class="mt-auto">
                                <a href="./consultar.php" class="btn btn-success btn-block w-100">Consultar Pokémons</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100"> 
                        <div class="text-center p-5">
                            <i class="fas fa-edit fa-10x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Modificar Pokemóns</h5>
                            <p class="card-text text-center">Realizar as alterações nos pokémons cadastrados</p>
                            <div class="mt-auto">
                                <a href="./configurar.php" class="btn btn-success btn-block w-100">Modificar Pokémons</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center p-5">
                            <i class="fas fa-info-circle fa-10x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Tipos</h5>
                            <p class="card-text text-center">Realizar o cadastro dos tipos dos Pokemóns</p>
                            <div class="mt-auto">
                                <a href="./tipo/tipo.php" class="btn btn-success btn-block w-100">Ir para tipos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../lib/fontawesome/js/all.min.js"></script>
</body>

</html>