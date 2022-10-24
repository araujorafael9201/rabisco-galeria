<?php
session_start();


# Conexão com o db
$conn = new mysqli("localhost", "user", "pwd", "db");

# Verifica se a conexão com o db está ok
if ($conn->connect_errno) {
    echo "Erro na Conexão com o Banco de Dados" . $conn->connect_errno . $conn->connect_error;
}

$titulo = $_POST['titulo'];
$descricao = $_POST['desc'];
$arquivo = $_FILES['arquivo']['tmp_name'];
$nome_arquivo = basename($_FILES['arquivo']['name']);


move_uploaded_file($arquivo, "../obras/$nome_arquivo");

$autor = $_SESSION['id'];
$result = $conn->query("INSERT INTO obra(titulo, descricao, autor, filename) VALUES ('$titulo', '$descricao', '$autor', '$nome_arquivo')");
$conn->commit();


# Fecha a conexão
$conn->close();



header('location: ../index.php');
?>