<?php
session_start();
include('connection.php');

// Verifying variables
if (empty($_POST['email']) || empty($_POST['password']))
    header('Location: ../login.html?message=Login%20Inválido!');

// Get information from the form
$email = $_POST['email'];
$password = md5($_POST['password']);

// Get information from the database
$sql = 'SELECT * FROM users';
$statement = $conn->query($sql);

// Matching information
$users = $statement->fetchall();
foreach ($users as $user) {
    if ($user['email'] == $email &&
        $user['password'] == $password
    ) {
        $_SESSION['user']['logged'] = TRUE;
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['name'] = $user['name'];
        $_SESSION['user']['email'] = $user['email'];
        header('Location: ../profile.php');
        break;
    }
}

?>