<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <title>Página Inicial</title>
</head>

<body class="text-center">

    <form method="POST" action="login.php" class="form-signin">
        <img src="../src/img/pokemon-logo.png" alt="Logo do Pokemón" class="img-fluid logo">
        <h1 class="h1 mb-3 font-weight-normal">Por favor, faça o login!</h1>
        <label for="email" class="sr-only">Endereço de e-mail</label>
        <input type="email" id="email" class="form-control" placeholder="Endereço de e-mail" required autofocus>
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" id="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-primary btn-lg" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; Pokemon 2021</p>
    </form>
</body>

</html>