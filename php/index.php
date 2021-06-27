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

    <form method="POST" action="login.php" class="form-signin needs-validation" novalidate>
        <img src="../src/img/pokemon-logo.png" alt="Logo do Pokemón" class="img-fluid logo" draggable="false">
        <label for="email" class="sr-only">Endereço de e-mail</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Endereço de e-mail" required>
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" id="senha" class="form-control" name="senha" placeholder="Senha" required>
        <button class="btn btn-primary btn-lg w-100" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; Pokemón 2021</p>
    </form>
    <script src="../lib/bootstrap.min.js"></script>
</body>
    <script>

    </script>
</html>