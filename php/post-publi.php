<?php
session_start();
date_default_timezone_set('America/Fortaleza');

include('connection.php');

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'] ?? die('tit');
    $description = $_POST['description'] ?? die('desc');
    $image = $_FILES['image'] ?? die('img');
    $author = $_SESSION['user']['id'];

    $ext = explode('.', $image['name']);
    $ext = end($ext);

    $new_name = getName(32).'-'.date('m-d-y-H-i-s').'.'.$ext;
    $creation_date = date('Y-m-d H:i:s');
    
    move_uploaded_file($image['tmp_name'], "../posts/img/{$new_name}");

    $sql = "INSERT INTO publications VALUES(NULL, '$title', '$description', $author, '$creation_date', '$new_name')";
    $conn->query($sql);
    $conn = null;
}

header('Location: ../profile.php');
?>