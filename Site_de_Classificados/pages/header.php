<?php require "config.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Classificados</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION["cLogin"]) && !empty($_SESSION["cLogin"])) :
                    require "classes/usuarios.class.php";
                    if (isset($_SESSION["cLogin"]) && !empty($_SESSION["cLogin"])) {
                        $u = new Usuarios();
                        $dado = $u->usuarioConectado($_SESSION["cLogin"]);
                    }
                ?>
                    <li class="usuario-conectado pt-15">Conectado: <?php echo $dado["nome"]; ?></li>
                    <li><a href="meus-anuncios.php">Meus Anúncios</a></li>
                    <li><a href="sair.php">Sair</a></li>
                <?php else : ?>
                    <li><a href="cadastre-se.php">Cadastra-se</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>