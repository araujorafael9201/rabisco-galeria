<?php

require_once('packets/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

try {
    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $dbna = $_ENV['DB_NAME'];
} catch (Exception $e) {
    echo '<strong>Failed to get environment variables</strong>';
}


// Database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbna", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo '<strong>Erro: </strong>' . $e->getMessage();
}

?>