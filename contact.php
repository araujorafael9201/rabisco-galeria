<?php 
session_start();
include('./php/session-variables.php');

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
    <title>Contate-nos</title>
    
    <!-- CONTACT STYLE -->
    <link rel="stylesheet" href="css/contact.css">
    
    <!-- HEADER STYLE -->
    <link rel="stylesheet" href="css/header.css">

    <!-- CONTACT SCRIPT -->
    <script src="js/contact.js" defer></script>
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
    <div class="left">
        <h1>Fale Conosco</h1>
        <p>Nunca é tarde para falar com a gente. Nos diga o que podemos fazer por você.</p>
    </div>
    <div class="right">
        <form action="" method="POST">
            <div class="half line">
                <p>Primeiro Nome *</p>
                <input type="text" name="first_name">
            </div>
            <div class="half line">
                <p>Último Nome *</p>
                <input type="text" name="last_name">
            </div>
            <div class="line">
                <p>Email *</p>
                <input type="email" name="email">
            </div>
            <div class="line">
                <p>Assunto *</p>
                <input type="text" name="subject">
            </div>
            <div class="line">
                <p>Mensagem</p>
                <textarea id="" rows="10" name="text_message"></textarea>
            </div>
            <div class="line" id="message"></div>
            <div class="line">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</main>

<section class="alert-box green"></section>

</body>
</html>