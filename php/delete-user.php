<?php
session_start();

$admin = 
    $_SESSION['user']['email'] == 'admin@admin' ?
    true : false;

if (!$admin) header('Location: profile.php');

if (!isset($_GET['id']) || empty($_GET['id']))
    header('Location: ../profile.php');

include('connection.php');

$id = $_GET['id'];

try {
    $sql = "DELETE FROM users WHERE id=$id;";
    $conn->query($sql);
    $conn = null;
    header('Location: ../profile.php');
} catch(PDOException $e) {
    header("Location: ../profile.php?message=$e");
}


?>