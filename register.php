<?php
session_start();

$admin = 
    $_SESSION['user']['email'] == 'admin@admin' ?
    true : false;

if (!$admin) header('Location: profile.php');

function displayLogin() {
    if (!$_SESSION['user']['logged']) {
        return '<a href="login.html">Logar</a>';
    }
    return "
        <a href='profile.php' class='logged'>Olá, {$_SESSION['user']['name']}</a>
        <a class='exit' href='php/logout.php'><img src='img/x-symbol.svg'></a>
    ";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuário</title>

    <!-- INDEX STYLE -->
    <link rel="stylesheet" href="css/register.css">

    <!-- HEADER STYLE -->
    <link rel="stylesheet" href="css/header.css">

    <!-- INDEX JAVASCRIPT -->
    <script src="js/register.js" defer></script>
</head>
<body>
    
<header class="navbar">
    <input type="checkbox" id="collapseMenu">
    <label for="collapseMenu">
        <img src="img/hamburguer_menu.svg" alt="M">
    </label>
    <div class="nav-links">
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="contact.php">Contato</a></li>
        </ul>
    </div>
    <div class="nav-logo">
        <h1>Rabisco</h1>
    </div>
    <div class="nav-login">
        <?php echo displayLogin(); ?>
    </div>
</header>

<main>
    <h2>Cadastrar usuário</h2>
    <form>
        <p>Nome: </p><input type="text" name="name" require>
        <p>Email: </p><input type="email" name="email" require>
        <p>Senha: </p><input type="text" name="password" require>
        <p>Confirmar senha: </p><input type="text" name="passwordConfirm">
        <span id="message"></span>
        <input type="submit" value="Cadastrar">
    </form>
</main>

<section class="alert-box green"></section>

</body>
</html>