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
        <?php 
        include('header.php');
        ?>

        <div class="galeria">
            <?php
            # Conexão com o db
            $conn = new mysqli("localhost", "user", "pwd", "db");

            $obras = $conn->query('select * from obra o join user u on o.autor = u.id;');

            foreach($obras as $obra) {
                echo '<div>';
                echo '<img class="obra" src="obras/' . $obra['filename'] . '"></img>';
                echo '<h2>' . $obra['titulo']  . '</h2>';
                echo '<h3>' . $obra['nome'] . '</h3>';
                echo '<p>' . $obra['descricao']  . '</p>';
                echo '</div>';
            }
            ?>
        </div>

        <a href="login.html">Login</a>
    </div>

    <script src="main.js"></script>
</body>
</html>