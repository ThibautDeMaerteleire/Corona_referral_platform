<?php 

session_start();

require_once (__DIR__.'/libs/deleteCookiesSessions.php');

Logout();

function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);
    die();
}

redirect('/login.php?logout=true');