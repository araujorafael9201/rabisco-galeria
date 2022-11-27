<?php
include('connection.php');

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

if (!isset($decode['name']) || empty($decode['name'])) {
    $messageStruct = [
        'id' => 2,
        'message' => 'Insira um nome valido'
    ];
    $message = json_encode($messageStruct);
    print_r($message);
    die();
}

if (!isset($decode['email']) || empty($decode['email'])) {
    $messageStruct = [
        'id' => 2,
        'message' => 'Insira um email valido'
    ];
    $message = json_encode($messageStruct);
    echo $message;
    die();
}

if (!isset($decode['password']) || empty($decode['password'])) {
    $messageStruct = [
        'id' => 2,
        'message' => 'Insira uma senha valida'
    ];
    $message = json_encode($messageStruct);
    echo $message;
    die();
}

$name = $decode['name'];
$email = $decode['email'];
$password = md5($decode['password']);

try {
    $sql = "INSERT INTO users VALUES (NULL,'$name','$email','$password');";
    $conn->query($sql);
    $conn = null;
    
    $messageStruct = [
        'id' => 1,
        'message' => 'Usuário registrado com sucesso!'
    ];
    $message = json_encode($messageStruct);
    echo $message;
} catch (PDOException $e) {
    $messageStruct = [
        'id' => 2,
        'message' => "ERRO: $e"
    ];
    $message = json_encode($messageStruct);
    echo $message;
}

?>