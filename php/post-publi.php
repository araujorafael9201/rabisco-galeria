<?php
date_default_timezone_set('America/Fortaleza');

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

    $ext = explode('.', $image['name']);
    $ext = end($ext);

    $new_name = getName(32).'-'.date('m-d-y-H-i-s');
    echo $new_name;
}


?>