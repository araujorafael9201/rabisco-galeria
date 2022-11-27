<?php
if (!isset($_GET['id']) || empty($_GET['id']))
    header('Location: ../profile.php');

include('connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id;";

?>