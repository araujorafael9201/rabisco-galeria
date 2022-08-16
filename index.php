<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rabisco</title>
</head>
<body>
    <div class="container">
        <ul class="header">
            <div class="header-content">
                <div class="links header-section">
                    <li><a href="">Início</a></li>
                    <li><a href="">Galeria</a></li>
                    <li><a href="">Sobre</a></li>
                </div>
                <li class="logo header-section">
                    <a href="/">Rabisco</a>
                </li>
                <div class="search header-section">
                    <form action="">
                        <input type="text" placeholder="Pesquise Aqui...">
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>

            <div class="header-collapsed">
                <a class="logo-collapsed" href="/">Rabisco</a>
                <button onclick="toggleContent()" class="collapsable-control">
                    <img src="static/img/collapse.svg" alt="">
                </button>
            </div>

        </ul>
    </div>

    <script src="main.js"></script>
</body>
</html>