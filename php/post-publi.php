<?php

$title = $_POST['title'] ?? die();
$description = $_POST['description'] ?? die();
$image = $_POST['image'][0] ?? die();

print_r($_POST);

?>