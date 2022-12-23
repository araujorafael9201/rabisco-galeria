<?php

// Initial setting of variables
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
    $_SESSION['user']['logged'] = FALSE;
}

?>