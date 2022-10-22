<?php
# Conexão com o db
$conn = new mysqli("localhost", "username", "pwd", "db");

# Verifica se a conexão com o db está ok
if ($conn->connect_errno) {
    echo "Erro na Conexão com o Banco de Dados" . $conn->connect_errno . $conn->connect_error;
}

$descricao = $_POST['desc'];
$arquivo = $_FILES['arquivo']['tmp_name'];
$nome_arquivo = basename($_FILES['arquivo']['name']);

// Não funciona :(
move_uploaded_file($arquivo, "../obras/$nome_arquivo");

$autor = $conn->query('SELECT id from user where id='. $_SESSION['id']);

$result = $conn->query('INSERT INTO obra(arquivo, descricao, autor) VALUES (' . $nome_arquivo . ',' . $descricao . ',' . $autor);

header('location: ../index.php');
?>