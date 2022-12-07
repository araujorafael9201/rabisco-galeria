<?php
include('connection.php');

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

try {
    $limit = 9;
    $row = (int)$decode['page'] * $limit;

    $sql = "SELECT * FROM publications LIMIT $row,$limit";
    $statement = $conn->query($sql);

    foreach ($statement->fetchall() as $post) {
        $title = $post['title'];
        $description = $post['description'];
        $author = $post['author'];
        $datetime = $post['creation_date'];
        $filename = $post['filename'];
    
    
        echo "
        <div class='post'>
            <img src='./posts/img/{$filename}' alt=''>
            <div class='info'>
                <h3 class='title'>{$title}</h3>
                <div class='date'>{$datetime}</div>
                <div class='author'>{$author}</div>
                <p class='description'>{$description}</p>
            </div>
        </div>
        ";
    }
} catch (Exception $e) {}


?>