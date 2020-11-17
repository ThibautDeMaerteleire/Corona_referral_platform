<?php
    require_once (__DIR__.'/models/Subscribe.php');
    require_once (__DIR__.'/../libs/config.php');

    if(isset($_POST["email"])) {
        new Subscribe($_POST["email"]);
    } else {
        http_response_code(406);
        echo "No email was given";
    }

?>