<?php
include('connection.php');

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

try {
    $limit = 12;
    $row = (int)$decode['page'] * $limit;

    $sql = "SELECT * FROM publications LIMIT $row,$limit";
    $statement = $conn->query($sql);

    foreach ($statement->fetchall() as $post) {
        $title = $post['title'];
        $description = $post['description'] ?? '';
        $author_id = $post['author'];
        
        $sql = "SELECT name FROM users WHERE id=$author_id";
        $result = $conn->query($sql);

        $author = $result->fetch()['name'];

        $datetime = $post['creation_date'];
        $datetime = explode(' ', $datetime);

        $date = $datetime[0];
        $date = explode('-', $date);
        $date = array_reverse($date);
        $date = implode('-', $date);

        $time = $datetime[1];
        $time = explode(':', $time);
        array_pop($time);
        $time = implode(':', $time);

        $filename = $post['filename'];
    
        echo "
        <div class='post'>
            <img src='./posts/img/{$filename}' alt=''>
            <div class='info'>
                <h3 class='title'>{$title}</h3>
                <div class='date'>{$date} ás {$time}</div>
                <div class='author'>{$author}</div>
                <p class='description'>{$description}</p>
            </div>
        </div>
        ";
    }
} catch (Exception $e) {}


?>
