<?php

function redirect($url, $statusCode = 303) {
   header('Location: ' . $url, true, $statusCode);
   die();
}

$bestandsnaam = str_replace(['/', '.php'], '', explode('?', $_SERVER['REQUEST_URI'])[0]);

if(isset($_SESSION['email']) && isset($_SESSION['id']) && isset($_SESSION['type']) && str_replace('/', '', dirname($_SERVER['REQUEST_URI'])) !=  $_SESSION['type']) {
    $type = $_SESSION['type'];
    redirect("/{$type}/index.php");
} else if($bestandsnaam != 'login' && $bestandsnaam != 'register' && str_replace('/', '', dirname($_SERVER['REQUEST_URI'])) !=  $_SESSION['type']) {
    redirect("/login.php");
}