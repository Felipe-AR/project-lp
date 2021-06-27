<?php
include './loginConfirm.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <title>Painel de Acesso</title>
</head>

<body>
    <div class="container">
        <div class="text-center text-uppercase mt-5">
            <h1 class="fs-1 fw-bold">MENU</p>
        </div>
        <div class="row">
            <div class="card-group">
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center">
                            <img src="../src/img/jogador-avatar.png" class="img-fluid p-4" style="height: 150px !important" alt="Ash do Pokémon" draggable="false">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Seção do Jogador</h5>
                            <p class="card-text text-center">Manutenção dos Jogadores</p>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Identificação</li>
                                <li class="list-group-item">Nome</li>
                                <li class="list-group-item">Endereços</li>
                                <li class="list-group-item">Inicial</li>
                                <li class="list-group-item">Pokébola</li>
                            </ul>
                            <div class="mt-auto">
                                <a href="./usuarios/usuario.php" class="btn btn-success btn-block w-100">Ir para jogadores</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center">
                            <img src="../src/img/pokemon-avatar.png" class="img-fluid p-4" style="height: 150px !important" alt="Squirtle de Óculos do Pokémon" draggable="false">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Seção do Pokémon</h5>
                            <p class="card-text text-center">Manutenção dos Pokémons</p>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Identificação</li>
                                <li class="list-group-item">Nome</li>
                                <li class="list-group-item">Tipo</li>
                            </ul>
                            <div class="mt-auto">
                                <a href="./pokemons/pokemon.php" class="btn btn-success btn-block w-100">Ir para pokémons</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center">
                            <img src="../src/img/pokebola-avatar.png" class="img-fluid p-4" style="height: 150px !important" alt="Squirtle de Óculos do Pokémon" draggable="false">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Seção da Pokébola</h5>
                            <p class="card-text text-center">Manutenção dos Pokémons</p>
                            <ul class="list-group list-group-flush list-group-numbered">
                                <li class="list-group-item">Identificação</li>
                                <li class="list-group-item">Nome</li>
                                <li class="list-group-item">Cor</li>
                            </ul>
                            <div class="mt-auto">
                                <a href="./pokebolas/pokebola.php" class="btn btn-success btn-block w-100">Ir para pokébolas</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                    <div class="card h-100">
                        <div class="text-center">
                            <i class="fas fa-sign-out-alt fa-10x"></i>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Encerrar Sessão</h5>
                            <p class="card-text text-center">Desconectar da sessão do administrador e retornar a página principal</p>
                            <div class="mt-auto">
                                <a href="./logout.php" class="btn btn-danger btn-block w-100">Desconectar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../lib/fontawesome/js/all.min.js"></script>
</body>

</html>