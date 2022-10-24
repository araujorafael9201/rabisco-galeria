<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adicionar Obra</title>
</head>
<body>
    <div class="container">

        <?php 
        include('header.php');

        if($_SESSION['logado'] == TRUE) {

        ?>
        <form action="php/adicionar.php" method='POST' enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder='Título: '>
            <textarea name="desc" cols="30" rows="10" placeholder="Descrição"></textarea>
            <input type="file" name="arquivo">
            <input type="submit" value="Enviar">
        </form>
        <?php 
        } else{
            header('location: index.php');
        }
            
        ?>
        <script src="main.js"></script>

    </div>
</body>
</html>