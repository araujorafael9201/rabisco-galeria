<?php
session_start();

# Conexão com o db
$conn = new mysqli("localhost", "username", "pwd", "db");

# Verifica se a conexão com o db está ok
if ($conn->connect_errno) {
    echo "Erro na Conexão com o Banco de Dados" . $conn->connect_errno . $conn->connect_error;
}

# Pega os usuários do db
$result = $conn->query("SELECT * FROM user");

# Pega informações do form
$email = $_POST['email'];
$senha = $_POST['senha'];

# Roda por todos os usuários e compara com as informações fornecidas
if ($users = $result->fetch_all()) {
    foreach($users as $user) {
        if ($user[1] == $email && $user[2] == $senha) {
            # Redireciona para o início se as informações estão corretas
            session_regenerate_id();
            $_SESSION['logado'] = TRUE;
            $_SESSION['id'] = $user[0];
            header('Location: ../index.php');
        }
    }
}

# Fecha a conexão
$result->close();

?>