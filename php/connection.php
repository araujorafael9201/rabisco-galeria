<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbna = 'rabisco';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbna", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo '<strong>Erro: </strong>' . $e->getMessage();
}

?>