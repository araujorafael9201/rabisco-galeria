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
        <?php 
        include('header.php');
        ?>

        <div class="galeria">
            <?php 
            $dir = getcwd() . '/obras';
            $obras = scandir($dir);

            foreach($obras as $obra) {
                if ($obra != '..' && $obra != '.') {
                    echo '<img class="obra" src="obras/' . $obra . '"></img>';
                }
            }
            ?>
        </div>

        <a href="login.html">Login</a>
    </div>

    <script src="main.js"></script>
</body>
</html>