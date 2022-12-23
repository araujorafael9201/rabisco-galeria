<?php
include('connection.php');

$user_id = $_SESSION['user']['id'];
$admin = false;
if ($_SESSION['user']['email'] == 'admin@admin') {
    $admin = true;
}

function showMyPublications() {
    global $admin, $user_id, $conn;

    $sql = !$admin ?
        "SELECT * FROM publications WHERE author=$user_id" :
        "SELECT * FROM publications";
    
    $statement = $conn->query($sql);

    foreach ($statement->fetchall() as $post) {
        $id = $post['id'];
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
            <a id='deleteButton' href='./php/del-my-publi.php?postid={$id}'><img src='img/trash.svg' alt=''></a>
            <img src='./posts/img/{$filename}' alt=''>
            <div class='info'>
                <h3 class='title'>{$title}</h3>
                <div class='date'>{$date} ás {$time}</div>
                <div class='author'>{$author}</div>
                <p class='description'>
                    {$description}
                </p>
            </div>
        </div>
        ";
    }

    $conn = null;
}

?>