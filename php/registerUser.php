<?php 

$name = $_POST['name'];
$email = $_POST['email'];

echo json_encode([$name, $email])

?>