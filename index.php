<?php 
session_start();
include('./php/session-variables.php');

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
    <title>Grupo Rabisco</title>

    <!-- INDEX STYLE -->
    <link rel="stylesheet" href="css/index.css">

    <!-- HEADER STYLE -->
    <link rel="stylesheet" href="css/header.css">

    <!-- INDEX JAVASCRIPT -->
    <script src="js/index.js" defer></script>
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
    <h2 class="title">galeria</h2>
    <div class="gallery-grid">
        
    <!-- POPULATED BY JAVASCRIPT -->
        
    </div>
</main>

<section class="modal">
    <div class="modal-content">
        <div class="img-container">
            <img src="" alt="modalImg">
        </div>
        <div class="info">
            <h3 class="title"></h3>
            <div class="date"></div>
            <div class="author"></div>
            <hr>
            <p class="description"></p>

        </div>
    </div>

    <button class="close-modal">
        <img class= "close-modal" src="img/x-symbol.svg">
    </button>
</section>

</body>
</html>