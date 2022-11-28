<?php 
session_start();
require('./php/get-users.php');


if (!isset($_SESSION['user']))
    header('Location: login.html');

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
    <title>Minha conta</title>

    <!-- PROFILE STYLE -->
    <link rel="stylesheet" href="css/profile.css">

    <!-- HEADER STYLE -->
    <link rel="stylesheet" href="css/header.css">

    <!-- PROFILE SCRIPT -->
    <script src="js/profile.js" defer></script>
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
    <div class="nav-login"><?php echo displayLogin(); ?></div>
</header>

<main>
    <!-- TAB SELECTOR -->
    <input type="radio" name="tabs" id="publish">
    <input type="radio" name="tabs" id="publications">
    <input type="radio" name="tabs" id="manage" checked>

    <!-- TAB LABELS -->
    <div class="nav">
        <label for="publish">Publicar</label>
        <div class="vl"></div>
        <label for="publications">Minhas postagens</label>
        <!-- if is admin user -->
        <div class="vl"></div>
        <label for="manage">Administrar usuarios</label>
    </div>

    <!-- ACTUAL TABS -->
    <div class="tab" id="publish">
        <form action="" class="publish">
            <p>Título</p>
            <input type="text" name="title">
            <p>Imagem</p>
            <label for="sendImage">Enviar Imagem</label>
            <span id="imageName"></span>
            <input type="file" accept="image/*" id="sendImage" class="hide">
            <p>Descrição</p>
            <textarea name="description"></textarea>
            <input type="submit" value="Publicar">
        </form>
    </div>

    <div class="tab" id="publications">
        <div class="posts">
            <div class="post">
                <div id="deleteButton"><img src="img/trash.svg" alt=""></div>
                <img src="https://via.placeholder.com/160x130" alt="">
                <div class="info">
                    <h3 class="title">Titulo</h3>
                    <div class="date">Data</div>
                    <div class="author">Autor</div>
                    <p class="description">
                        Descrição
                    </p>
                </div>
            </div>
            <div class="post">
                <img src="https://via.placeholder.com/160x130" alt="">
                <div class="info">
                    <h3 class="title">Titulo</h3>
                    <div class="date">Data</div>
                    <div class="author">Autor</div>
                    <p class="description">
                        Descrição
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="tab" id="manage">
        <div class="link-container">
            <a href="register.php" class="register-link">Registrar usuário</a>
        </div>
        <div class="users">
            <?php displayUsers();?>
        </div>
    </div>
</main>

</body>
</html>