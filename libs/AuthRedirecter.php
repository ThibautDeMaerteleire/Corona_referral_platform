<?php

require_once 'config/index.php';

function redirect($url, $statusCode = 303) {
   header('Location: ' . $url, true, $statusCode);
   die();
}

if(isset($_SESSION['email']) && isset($_SESSION['id']) && isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
    redirect("/{$type}/index.php");
}

