<?php
session_start();

function displayLogin() {
    if (!$_SESSION['user']['logged']) {
        return '<a href="login.html">Logar</a>';
    }
    return "<a href='profile.php' class='logged'>Olá, {$_SESSION['user']['name']}</a>";
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
            <li><a href="contact.html">Contato</a></li>
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
    <form action="">
        <p>Nome: </p><input type="text" name="name" required>
        <p>Email: </p><input type="email" name="email" required>
        <p>Senha: </p><input type="text" name="password" required>
        <p>Confirmar senha: </p><input type="text" name="passwordConfirm" required>
        <span id="message"></span>
        <input type="submit" value="Cadastrar">
    </form>
</main>

<section class="alert-box green"></section>

</body>
</html>