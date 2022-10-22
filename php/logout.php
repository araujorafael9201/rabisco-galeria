<?php

session_start();

unset($_SESSION['id']);
$_SESSION['logado'] = FALSE;

header('location: ../index.php');
?>