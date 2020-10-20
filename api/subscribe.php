<?php
    require_once 'models/Subscribe.php';
    require_once '../config/index.php';

    if(isset($_POST["email"])) {
        new Subscribe($_POST["email"]);
    } else {
        http_response_code(406);
        echo "No email was given";
    }

?>