<?php
session_start();
include('connection.php');

$admin = false;
if ($_SESSION['user']['email'] == 'admin@admin') {
    $admin = true;
}

$user_id = $_SESSION['user']['id'];
$post_id = $_GET['postid'];

if (!$admin) {
    $sql = "SELECT author FROM publications WHERE id=$post_id";
    $statement = $conn->query($sql);
    $author_id = $statement->fetch()['author'];

    $verify_own = $user_id == $post_id;
    if ($verify_own) {
        $sql = "DELETE FROM publications WHERE id=$post_id";
        $conn->query($sql);
    }
} else {
    $sql = "DELETE FROM publications WHERE id=$post_id";
    $conn->query($sql);
}

$conn = null;

header('Location: ../profile.php');
?>